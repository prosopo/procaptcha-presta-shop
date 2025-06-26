<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Widget;

final class WidgetMountPoint
{
    const POSITION_BEFORE = 'before';
    const POSITION_AFTER = 'after';

    public string $settingName='';
    public string $submitField='';
    public string $anchor='';
    public string $position='';

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
}
