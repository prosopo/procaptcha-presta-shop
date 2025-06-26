<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Widget;

use Io\Prosopo\Procaptcha\Settings\SettingsConfiguration;
use Tools;
use function WPLake\Typed\string;

final class WidgetMounter
{
    /**
     * When there are no hooks in the target template and/or validation process:
     * 1) injection is used to add captcha, as straight template overriding isn't supported https://devdocs.prestashop-project.org/8/modules/concepts/overrides/
     * 2) validation is called from the level above
     *
     * @var array<string, WidgetMountPoint>
     */
    private array $mountPoints;

    /**
     * @var array<string, WidgetMountPoint> $integrations
     */
    // fixme introduce a custom hook to allow modifications (for custom themes)
    public function __construct(array $integrations)
    {
        $this->mountPoints = $integrations;
    }

    public function mountWidget(string $controllerName, string $html): string
    {
        $mountPoint = $this->getMountPoint($controllerName);

        if ($mountPoint instanceof WidgetMountPoint) {
            $widgetHtml = WidgetIntegration::renderWidget($mountPoint->settingName);

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
