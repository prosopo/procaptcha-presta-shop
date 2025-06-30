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

use Io\Prosopo\Procaptcha\Logger;
use Io\Prosopo\Procaptcha\Settings\SettingsConfiguration;
use Io\Prosopo\Procaptcha\Widget\Widget;
use Io\Prosopo\Procaptcha\Widget\WidgetIntegration;
use Io\Prosopo\Procaptcha\Widget\WidgetMounter;
use Io\Prosopo\Procaptcha\Widget\WidgetMountPoint;
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

        // fixme introduce a custom hook to allow modifications (for custom themes)
        $widgetMountPoints = $this->getWidgetMountPoints();

        $this->widgetMounter = new WidgetMounter($widgetMountPoints);
        $this->widgetValidationErrorHandlers = $this->getWidgetValidationErrorHandlers();
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
     * "/registration" form rendering.
     * this hook is defined in themes/classic/templates/customer/_partials/customer-form.tpl
     * services aren't available here... so $this->get() returns null...
     */
    public function hookCreateAccountForm(): string
    {
        return WidgetIntegration::renderWidget(SettingsConfiguration::FIELD_IS_ON_REGISTRATION_FORM);
    }

    /**
     * "/registration" form validation
     */
    public function hookActionSubmitAccountBefore(): bool
    {
        if (WidgetIntegration::validateFormSubmission(SettingsConfiguration::FIELD_IS_ON_REGISTRATION_FORM)) {
            return true;
        }

        $this->addWidgetValidationError(WidgetMountPoint::ERROR_TYPE_CONTROLLER);

        return false;
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
        $validationError = $this->context->cookie->{self::COOKIE_VALIDATION_ERROR} ?? '';
        $validationErrorController = string($validationError);

        if ($currentController === $validationErrorController) {
            unset($this->context->cookie->{self::COOKIE_VALIDATION_ERROR});
            $this->context->cookie->write();

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
                ->setAnchor('<section class="form-fields">')
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
                $this->context->controller->errors[] = Widget::getValidationError();
            },
            WidgetMountPoint::ERROR_TYPE_REDIRECT => function () {
                $this->context->cookie->{self::COOKIE_VALIDATION_ERROR} = $this->getCurrentControllerName();
                $this->context->cookie->write();

                $currentUrl = Tools::getCurrentUrl();
                Tools::redirect($currentUrl);
            },
        ];
    }

    protected function getCurrentControllerName(): string
    {
        return $this->context->controller->php_self;
    }

    protected function addWidgetValidationError(string $errorType): void
    {
        if (key_exists($errorType, $this->widgetValidationErrorHandlers)) {
            $this->widgetValidationErrorHandlers[$errorType]();
        }
    }
}
