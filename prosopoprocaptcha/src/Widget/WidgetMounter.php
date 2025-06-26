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
     * @var array<string, WidgetMountPoint> $integrations
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

    public function validateControllerMountPoint(string $controllerName): bool
    {
        $mountPoint = $this->getMountPoint($controllerName);

        return $mountPoint instanceof WidgetMountPoint ?
            WidgetIntegration::validateMountPoint($mountPoint) :
            true;
    }

    protected function getMountPoint(string $controllerName): ?WidgetMountPoint
    {
        return key_exists($controllerName, $this->mountPoints) ?
            $this->mountPoints[$controllerName] :
            null;
    }
}
