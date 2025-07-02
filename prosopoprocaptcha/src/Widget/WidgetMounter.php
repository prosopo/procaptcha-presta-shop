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
final class WidgetMounter
{
    /**
     * @var array<string, WidgetMountPoint>
     */
    private array $mountPoints;

    /**
     * @param array<string, WidgetMountPoint> $integrations
     */
    public function __construct(array $integrations)
    {
        $this->mountPoints = $integrations;
    }

    public function mountWidget(string $controllerName, string $html): string
    {
        $mountPoint = $this->getMountPoint($controllerName);

        if ($mountPoint instanceof WidgetMountPoint
            && $mountPoint->isMountingExpected()) {
            $widgetHtml = WidgetIntegration::renderWidget($mountPoint->settingName);

            // empty if integration is not active
            if (strlen($widgetHtml) > 0) {
                return WidgetIntegration::injectWidget($mountPoint, $widgetHtml, $html);
            }
        }

        return $html;
    }

    /**
     * @return string|null WidgetMountPoint->errorType
     */
    public function validateControllerMountPoint(string $controllerName): ?string
    {
        $mountPoint = $this->getMountPoint($controllerName);

        if ($mountPoint instanceof WidgetMountPoint) {
            return WidgetIntegration::validateMountPoint($mountPoint) ?
                null :
                $mountPoint->errorType;
        }

        return null;
    }

    protected function getMountPoint(string $controllerName): ?WidgetMountPoint
    {
        return key_exists($controllerName, $this->mountPoints) ?
            $this->mountPoints[$controllerName] :
            null;
    }
}
