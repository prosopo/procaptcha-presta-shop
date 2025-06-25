<?php
/**
 * Prosopo Procaptcha Module
 *
 * GDPR compliant, privacy-friendly, and better-value CAPTCHA for your PrestaShop website.
 *
 * @author Prosopo <team@prosopo.io>
 * @copyright Prosopo
 * @license MIT License
 */

declare(strict_types=1);

use Io\Prosopo\Procaptcha\Settings\SettingsConfiguration;
use Io\Prosopo\Procaptcha\Widget;
use function WPLake\Typed\string;

if (!defined('_PS_VERSION_')) {
    exit;
}

final class ProsopoProcaptcha extends Module
{
    const HOOKS = [
        // generic hooks - for cases when no integration-specific hooks are present
        'actionFrontControllerInitAfter',
        'actionOutputHTMLBefore',
        // integration-specific hooks
        'createAccountForm',
        'actionSubmitAccountBefore',
    ];

    /**
     * When there are no hooks in the target templates, injection is the single way to add captcha,
     * as straight template overriding isn't supported:
     * https://devdocs.prestashop-project.org/8/modules/concepts/overrides/
     * "Overriding a theme template from a module is NOT possible, and never will"
     */
    const WIDGET_PAGE_INJECTIONS = [
        // controller name => injection (before/after)
        'contact' => [
            'before' => '<footer class="form-footer',
            'settingsField' => SettingsConfiguration::FIELD_IS_ON_CONTACT_FORM,
        ],
    ];

    /**
     * When there are no hooks in the target form submission process,
     * using top level 'actionFrontControllerInitAfter' is the single way to add custom validation
     */
    const WIDGET_VALIDATION_POINTS = [
        // controller name => settings
        'contact' => [
            'submitField' => 'submitMessage',
            'settingsField' => SettingsConfiguration::FIELD_IS_ON_CONTACT_FORM,
        ],
    ];

    public function __construct()
    {
        $this->name = 'prosopoprocaptcha';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Prosopo';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '8.0.0',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        // fixme remove after active development is complete.
        foreach (array_diff(self::HOOKS, ['createAccountForm']) as $hook) {
            if ($this->isRegisteredInHook($hook)) {
                continue;
            }

            $this->registerHook($hook);
        }

        $this->displayName = $this->trans('Prosopo Procaptcha', [], 'Modules.Prosopoprocaptcha.Admin');
        $this->description = $this->trans('GDPR compliant, privacy-friendly, and better-value CAPTCHA for your PrestaShop website.', [], 'Modules.Prosopoprocaptcha.Admin');

        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall?', [], 'Modules.Prosopoprocaptcha.Admin');

    }

    public function install(): bool
    {
        return parent::install() &&
            $this->registerHook(self::HOOKS);
    }

    public function uninstall(): bool
    {
        /**
         * @var SettingsConfiguration $settingsConfiguration
         */
        $settingsConfiguration = $this->get('prestashop.module.prosopoprocaptcha.form.settings_configuration');

        $settingsConfiguration->removeAllFields();

        return parent::uninstall();
    }

    public function getContent(): void
    {
        $route = $this->get('router')->generate('prosopo_procaptcha_settings');

        Tools::redirectAdmin($route);
    }

    // this hook is defined in themes/classic/templates/customer/_partials/customer-form.tpl
    public function hookCreateAccountForm(): string
    {
        $isOnRegistrationForm = SettingsConfiguration::getField(
            SettingsConfiguration::FIELD_IS_ON_REGISTRATION_FORM
        );

        if ($isOnRegistrationForm) {
            // services aren't available here... so $this->get() returns null...
            return $this->renderWidget();
        }

        return '';
    }

    public function hookActionSubmitAccountBefore(): bool
    {
        $isOnRegistrationForm = SettingsConfiguration::getField(
            SettingsConfiguration::FIELD_IS_ON_REGISTRATION_FORM
        );

        if (!$isOnRegistrationForm ||
            Widget::verifyToken()) {
            return true;
        }

        $this->context->controller->errors[] = Widget::getValidationError();

        return false;
    }

    /**
     * @param array<string,mixed> $arguments
     */
    public function hookActionOutputHTMLBefore(array $arguments): void
    {
        $controllerName = $this->getControllerName();

        // fixme introduce a custom hook to allow modifications
        if (key_exists($controllerName, self::WIDGET_PAGE_INJECTIONS)) {
            $injection = self::WIDGET_PAGE_INJECTIONS[$controllerName];

            $settingsField = string($injection, 'settingsField');

            if (0 === strlen($settingsField) ||
                SettingsConfiguration::getField($settingsField)) {
                $before = string($injection, 'before');
                $after = string($injection, 'after');

                $html = string($arguments, 'html');

                $search = $after . $before;
                $replacement = $after . $this->renderWidget() . $before;

                // no return, as 'html' key is passed as a reference (aka pointer)
                $arguments['html'] = str_replace($search, $replacement, $html);
            }
        }
    }

    public function hookActionFrontControllerInitAfter(): void
    {
        $controllerName = $this->getControllerName();

        // fixme introduce a custom hook to allow modifications
        if (key_exists($controllerName, self::WIDGET_VALIDATION_POINTS)) {
            $settings = self::WIDGET_VALIDATION_POINTS[$controllerName];

            $submitField = string($settings['submitField']);
            $settingsField = string($settings['settingsField']);

            if (Tools::isSubmit($submitField) &&
                SettingsConfiguration::getField($settingsField)) {
                if (Widget::verifyToken()) {
                    return;
                }

                $this->context->controller->errors[] = Widget::getValidationError();
            }
        }
    }

    protected function getControllerName(): string
    {
        return $this->context->controller->php_self;
    }

    protected function renderWidget(): string
    {
        $widget = Widget::renderWidget() .
            Widget::renderWidgetScripts();

        return sprintf('<div class="prosopo-procaptcha__row" 
style="margin: 0 0 20px;display:flex;justify-content: center;">
<div class="prosopo-procaptcha__field" style="max-width:300px; width: 100%%;">
%s
</div>
</div>',
            $widget);
    }
}
