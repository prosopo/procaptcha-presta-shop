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

if (!defined('_PS_VERSION_')) {
    exit;
}

final class ProsopoProcaptcha extends Module
{
    const HOOKS = [
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

    /* fixme public function hookActionFrontControllerSetMedia()
   {
       $this->context->controller->registerJavascript(
           'mailalerts-js',
           'modules/' . $this->name . '/js/mailalerts.js'
       );
   }*/

    public function hookCreateAccountForm(): string
    {
        $isOnRegistrationForm = SettingsConfiguration::getField(
            SettingsConfiguration::FIELD_IS_ON_REGISTRATION_FORM
        );

        if ($isOnRegistrationForm) {
            // services aren't available here... so $this->get() returns null...

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
}

