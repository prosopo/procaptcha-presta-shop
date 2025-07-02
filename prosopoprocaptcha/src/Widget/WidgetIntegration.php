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

namespace Io\Prosopo\Procaptcha\Widget;

if (!defined('_PS_VERSION_')) {
    exit;
}

use Io\Prosopo\Procaptcha\Settings\SettingsConfiguration;

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
        return $mountPoint->isValidationExpected() && \Tools::isSubmit($mountPoint->submitField) ?
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
