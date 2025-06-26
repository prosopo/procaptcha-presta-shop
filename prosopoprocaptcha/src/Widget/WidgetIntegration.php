<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Widget;

use Io\Prosopo\Procaptcha\Settings\SettingsConfiguration;
use Tools;

final class WidgetIntegration
{
    public static function renderWidget(string $integrationSetting): string
    {
        $isActive = true === SettingsConfiguration::getField($integrationSetting);

        return $isActive ?
            Widget::renderWidget() . Widget::renderWidgetScripts() :
            '';
    }

    public static function validateFormSubmission(string $integrationSetting): bool
    {
        $isActive = true === SettingsConfiguration::getField($integrationSetting);

        return $isActive ?
            Widget::verifyToken() :
            true;
    }

    public static function validateMountPoint(WidgetMountPoint $mountPoint): bool
    {
        return $mountPoint->isValidationExpected() && Tools::isSubmit($mountPoint->submitField) ?
            self::validateFormSubmission($mountPoint->settingName) :
            true;
    }

    public static function injectWidget(WidgetMountPoint $mountPoint, string $widgetHtml, string $subject): string
    {
        $beforeHtml = WidgetMountPoint::POSITION_BEFORE === $mountPoint->position ?
            $mountPoint->anchor :
            '';
        $afterHtml = WidgetMountPoint::POSITION_AFTER === $mountPoint->position ?
            $mountPoint->anchor :
            '';

        $search = $beforeHtml . $afterHtml;
        $replacement = $afterHtml . $widgetHtml . $beforeHtml;

        return str_replace($search, $replacement, $subject);
    }
}
