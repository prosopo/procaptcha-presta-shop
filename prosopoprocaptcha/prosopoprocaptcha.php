<?php

/**
 * Copyright 2021-2025 Prosopo (UK) Ltd.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author Prosopo <team@prosopo.io>
 * @copyright Prosopo
 * @license Apache License, Version 2.0
 */

declare(strict_types=1);

if (!defined('_PS_VERSION_')) {
    exit;
}

use Io\Prosopo\Procaptcha\Settings\SettingsConfiguration;
use Io\Prosopo\Procaptcha\Widget\Widget;
use Io\Prosopo\Procaptcha\Widget\WidgetIntegration;
use Io\Prosopo\Procaptcha\Widget\WidgetMounter;
use Io\Prosopo\Procaptcha\Widget\WidgetMountPoint;
use PrestaShopBundle\Service\Routing\Router;

use function WPLake\Typed\string;

final class ProsopoProcaptcha extends Module
{
    const VERSION = '1.0.0';
    const HOOKS = [
        // generic hooks - for cases when no integration-specific hooks are present
        'actionFrontControllerInitAfter',
        'actionOutputHTMLBefore',
        // integration-specific hooks
        'createAccountForm',
        'actionSubmitAccountBefore',
    ];
    /**
     * Cookie is used to display a submission error -
     * when there is no way to hook into the particular form processing.
     */
    const COOKIE_VALIDATION_ERROR = 'procaptcha-error';

    private WidgetMounter $widgetMounter;
    /**
     * @var array<string,callable>
     */
    private array $widgetValidationErrorHandlers;

    public function __construct()
    {
        $this->name = 'prosopoprocaptcha';
        $this->tab = 'front_office_features';
        // do not use the constant here, it'll fail Prestashop validation
        $this->version = '1.0.0';
        $this->author = 'Prosopo';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '8.0.0',
            'max' => _PS_VERSION_,
        ];
        $this->bootstrap = true;

        parent::__construct();

        // todo uncomment during development.
        /* foreach (array_diff(self::HOOKS, ['createAccountForm']) as $hook) {
             if ($this->isRegisteredInHook($hook)) {
                 continue;
             }

             $this->registerHook($hook);
         }*/

        $this->displayName = $this->l('Prosopo Procaptcha');
        $this->description = $this->l('GDPR compliant, privacy-friendly, and better-value CAPTCHA for your PrestaShop website.');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        $widgetMountPoints = $this->getWidgetMountPoints();
        $this->widgetMounter = new WidgetMounter($widgetMountPoints);

        $this->widgetValidationErrorHandlers = $this->getWidgetValidationErrorHandlers();
    }

    public function install(): bool
    {
        return parent::install()
            && $this->registerHook(self::HOOKS);
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
        $router = $this->get('router');

        if ($router instanceof Router) {
            $route = $router->generate('prosopo_procaptcha_settings');

            Tools::redirectAdmin($route);
        }
    }

    /**
     * "/registration" form rendering.
     * this hook is defined in themes/classic/templates/customer/_partials/customer-form.tpl
     * services aren't available here... so $this->get() returns null...
     */
    public function hookCreateAccountForm(): string
    {
        return 'registration' === $this->getCurrentControllerName() ?
            WidgetIntegration::renderWidget(SettingsConfiguration::FIELD_IS_ON_REGISTRATION_FORM) :
            '';
    }

    /**
     * "/registration" form validation
     */
    public function hookActionSubmitAccountBefore(): bool
    {
        if ('registration' === $this->getCurrentControllerName()
            && !WidgetIntegration::validateFormSubmission(SettingsConfiguration::FIELD_IS_ON_REGISTRATION_FORM)) {
            $this->addWidgetValidationError(WidgetMountPoint::ERROR_TYPE_CONTROLLER);

            return false;
        }

        return true;
    }

    /**
     * @param array<string,mixed> $arguments
     */
    public function hookActionOutputHTMLBefore(array $arguments): void
    {
        $controllerName = $this->getCurrentControllerName();
        $html = string($arguments, 'html');

        // no return, as 'html' key is passed as a reference (aka pointer)
        $arguments['html'] = $this->widgetMounter->mountWidget($controllerName, $html);
    }

    public function hookActionFrontControllerInitAfter(): void
    {
        $controllerName = $this->getCurrentControllerName();

        if ($this->displayPreviousSubmissionError($controllerName)) {
            return;
        }

        $errorType = $this->widgetMounter->validateControllerMountPoint($controllerName);

        if (is_null($errorType)) {
            return;
        }

        $this->addWidgetValidationError($errorType);
    }

    protected function displayPreviousSubmissionError(string $currentController): bool
    {
        $validationErrorController = $this->getCookie(self::COOKIE_VALIDATION_ERROR);

        if ($currentController === $validationErrorController) {
            $this->deleteCookie(self::COOKIE_VALIDATION_ERROR);

            $this->addWidgetValidationError(WidgetMountPoint::ERROR_TYPE_CONTROLLER);

            return true;
        }

        return false;
    }

    /**
     * When there are no hooks in the target template and/or validation process:
     * 1) injection is used to add captcha, as straight template overriding isn't supported https://devdocs.prestashop-project.org/8/modules/concepts/overrides/
     * 2) validation is called from the level above, using the 'actionFrontControllerInitAfter' hook
     *
     * @return array<string,WidgetMountPoint>
     */
    protected function getWidgetMountPoints(): array
    {
        return [
            // "/registration" => handled manually, via hooks.
            // "/login"
            'authentication' => (new WidgetMountPoint())
                ->setSettingName(SettingsConfiguration::FIELD_IS_ON_LOGIN_FORM)
                ->setSubmitField('email')
                ->setErrorType(WidgetMountPoint::ERROR_TYPE_REDIRECT)
                ->setAnchor('<footer class="form-footer')
                ->setPosition(WidgetMountPoint::POSITION_BEFORE),
            // "/contact-us"
            'contact' => (new WidgetMountPoint())
                ->setSettingName(SettingsConfiguration::FIELD_IS_ON_CONTACT_FORM)
                ->setSubmitField('submitMessage')
                ->setAnchor('<footer class="form-footer')
                ->setPosition(WidgetMountPoint::POSITION_BEFORE),
            // "/password-recovery"
            'password' => (new WidgetMountPoint())
                ->setSettingName(SettingsConfiguration::FIELD_IS_ON_PASSWORD_RECOVERY_FORM)
                ->setSubmitField('email')
                ->setAnchor('<section class="form-fields"')
                ->setPosition(WidgetMountPoint::POSITION_BEFORE),
        ];
    }

    /**
     * @return array<string,callable>
     */
    protected function getWidgetValidationErrorHandlers(): array
    {
        return [
            WidgetMountPoint::ERROR_TYPE_CONTROLLER => function () {
                $controller = $this->context->controller;

                if ($controller instanceof Controller) {
                    $controller->errors[] = Widget::getValidationError();
                }
            },
            WidgetMountPoint::ERROR_TYPE_REDIRECT => function () {
                $this->setCookie(self::COOKIE_VALIDATION_ERROR, $this->getCurrentControllerName());

                $currentUrl = Tools::getCurrentUrl();
                Tools::redirect($currentUrl);
            },
        ];
    }

    protected function getCurrentControllerName(): string
    {
        $controller = $this->context->controller;

        return $controller instanceof Controller ?
            // for some reason, on the "my alerts page" it contains NULL
            (string) $controller->php_self :
            '';
    }

    protected function addWidgetValidationError(string $errorType): void
    {
        if (key_exists($errorType, $this->widgetValidationErrorHandlers)) {
            $this->widgetValidationErrorHandlers[$errorType]();
        }
    }

    protected function setCookie(string $name, string $value): void
    {
        $cookie = $this->context->cookie;

        if ($cookie instanceof Cookie) {
            $cookie->{$name} = $value;
            $cookie->write();
        }
    }

    protected function getCookie(string $name): string
    {
        $cookie = $this->context->cookie;

        if ($cookie instanceof Cookie) {
            $value = $cookie->{$name} ?? '';

            return string($value);
        }

        return '';
    }

    protected function deleteCookie(string $name): void
    {
        $cookie = $this->context->cookie;

        if ($cookie instanceof Cookie) {
            unset($cookie->{$name});
            $cookie->write();
        }
    }
}
