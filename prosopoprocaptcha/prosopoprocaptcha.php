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
        'actionAdminControllerSetMedia',
        'createAccountForm',
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

    public function hookCreateAccountForm(): string
    {
        // fixme only if enabled.
        // services aren't available here... so $this->get() returns null...

        return '<prosopo-procaptcha-presta-widget class="prosopo-procaptcha-presta-widget" style="display: block;">
    <div class="prosopo-procaptcha"></div>
</prosopo-procaptcha-presta-widget>';
    }

    /* fixme public function hookActionFrontControllerSetMedia()
     {
         $this->context->controller->registerJavascript(
             'mailalerts-js',
             'modules/' . $this->name . '/js/mailalerts.js'
         );
     }*/

    public function hookActionAdminControllerSetMedia(array $params)
    {
        return;// fixme
        $controller = $this->context->controller;

        if ('ProsopoProcaptchaSettings' === $controller->controller_name) {
            // fixme
            $this->context->controller->addJs('https://js.prosopo.io/js/procaptcha.bundle.js');
            $controller->addJs($this->getPathUri() . 'dist/widget-integration.min.js');
        }

    }


    public function getContent(): void
    {
        $route = $this->get('router')->generate('prosopo_procaptcha_settings');

        Tools::redirectAdmin($route);
    }
}

