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
use Io\Prosopo\Procaptcha\WidgetIntegration;
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


    /**
     * this hook is defined in themes/classic/templates/customer/_partials/customer-form.tpl
     * services aren't available here... so $this->get() returns null...
     */
    public function hookCreateAccountForm(): string
    {
        // fixme make it more generic.
        $isOnRegistrationForm = SettingsConfiguration::getField(
            SettingsConfiguration::FIELD_IS_ON_REGISTRATION_FORM
        );

        if ($isOnRegistrationForm) {
            return WidgetIntegration::renderWidget();
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

        $this->addValidationError();

        return false;
    }

    /**
     * @param array<string,mixed> $arguments
     */
    public function hookActionOutputHTMLBefore(array $arguments): void
    {
        $controllerName = $this->getControllerName();
        $html = string($arguments, 'html');

        // no return, as 'html' key is passed as a reference (aka pointer)
        $arguments['html'] = WidgetIntegration::integrateWidget($controllerName, $html);
    }

    public function hookActionFrontControllerInitAfter(): void
    {
        $controllerName = $this->getControllerName();

        if (WidgetIntegration::validateWidget($controllerName)) {
            return;
        }

        $this->addValidationError();
    }

    protected function getControllerName(): string
    {
        return $this->context->controller->php_self;
    }

    protected function addValidationError():void
    {
        $this->context->controller->errors[] = Widget::getValidationError();
    }
}
