<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Widget;

use Io\Prosopo\Procaptcha\Settings\SettingsConfiguration;
use Tools;
use function WPLake\Typed\string;

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

        if ($mountPoint instanceof WidgetMountPoint &&
            $mountPoint->isMountingExpected()) {
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
