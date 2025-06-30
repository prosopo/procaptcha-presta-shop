<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Widget;

/**
 * When there are no hooks in the target template and/or validation process:
 * 1) injection is used to add captcha, as straight template overriding isn't supported https://devdocs.prestashop-project.org/8/modules/concepts/overrides/
 * 2) validation is called from the level above, using the 'actionFrontControllerInitAfter' hook
 */
final class WidgetMountPoint
{
    const POSITION_BEFORE = 'before';
    const POSITION_AFTER = 'after';
    /**
     * By default, failed validation is prevented by adding an error to the current controller.
     */
    const ERROR_TYPE_CONTROLLER = 'error_type_controller';
    /**
     * In some forms, like login, controller errors don't prevent the processing logic,
     * so redirect to the same page prevents it and contains a show-error argument.
     */
    const ERROR_TYPE_REDIRECT = 'error_type_redirect';

    public string $settingName = ''; // mounting happens only when the related setting is enabled
    public string $submitField = ''; // keep empty if there is a related hook and validation happens directly
    public string $anchor = ''; // keep empty if there is a related hook and mounting happens directly
    public string $position = ''; // keep empty if there is a related hook and mounting happens directly
    public string $errorType = self::ERROR_TYPE_CONTROLLER;

    //// setters

    public function setSettingName(string $settingName): self
    {
        $this->settingName = $settingName;

        return $this;
    }

    public function setSubmitField(string $submitField): self
    {
        $this->submitField = $submitField;

        return $this;
    }

    public function setAnchor(string $anchor): self
    {
        $this->anchor = $anchor;

        return $this;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function setErrorType(string $errorType): self
    {
        $this->errorType = $errorType;

        return $this;
    }

    //// getters

    public function isValidationExpected(): bool
    {
        return strlen($this->submitField) > 0;
    }

    public function isMountingExpected(): bool
    {
        return strlen($this->anchor) > 0;
    }
}
