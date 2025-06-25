<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha;

use Io\Prosopo\Procaptcha\Settings\SettingsConfiguration;
use Tools;
use function WPLake\Typed\string;

final class WidgetIntegration
{
    private const POSITION_BEFORE = 'before';
    private const POSITION_AFTER = 'after';

    /**
     * controllerName => [...]
     *
     *  When there are no hooks in the target template and/or validation process:
     *  1) injection is used to add captcha, as straight template overriding isn't supported https://devdocs.prestashop-project.org/8/modules/concepts/overrides/
     *  2) validation is called on the level above
     *
     * @var array<string, array{
     *     settingsField?: string,
     *     anchor?: string,
     *     position?: string,
     *     validationSubmitField?: string
     * }>
     */
    private static array $targets = [
        'contact' => [
            'settingsField' => SettingsConfiguration::FIELD_IS_ON_CONTACT_FORM,
            'anchor' => '<footer class="form-footer',
            'position' => self::POSITION_BEFORE,
            'validationSubmitField' => 'submitMessage',
        ],
    ];

    public static function integrateWidget(string $controllerName, string $html): string
    {
        $target = self::getTarget($controllerName);

        if (is_array($target) &&
            self::isActiveTarget($target)) {
            $anchor = string($target, 'anchor');
            $position = string($target, 'position');

            return self::injectWidget($html, $anchor, $position);
        }

        return $html;
    }

    public static function validateWidget(string $controllerName): bool
    {
        $target = self::getTarget($controllerName);
        $submitField = string($target, 'validationSubmitField');

        return is_array($target) &&
        self::isActiveTarget($target) &&
        Tools::isSubmit($submitField) ?
            Widget::verifyToken() :
            true;
    }

    public static function renderWidget(): string
    {
        $widget = Widget::renderWidget() .
            Widget::renderWidgetScripts();

        return sprintf('<div class="prosopo-procaptcha__row" 
style="margin: 0 0 20px;display:flex;justify-content: center;">
<div class="prosopo-procaptcha__field" style="max-width:300px; width: 100%%;">
%s
</div>
</div>',
            $widget);
    }

    protected static function injectWidget(string $html, string $anchor, string $position): string
    {
        $beforeHtml = self::POSITION_BEFORE === $position ? $anchor : '';
        $afterHtml = self::POSITION_AFTER === $position ? $anchor : '';;

        $search = $beforeHtml . $afterHtml;
        $replacement = $afterHtml . self::renderWidget() . $beforeHtml;

        return str_replace($search, $replacement, $html);
    }

    /**
     * @param array<string,mixed> $integration
     */
    protected static function isActiveTarget(array $integration): bool
    {
        $settingsField = string($integration, 'settingsField');

        return 0 === strlen($settingsField) ||
            true === SettingsConfiguration::getField($settingsField);
    }

    /**
     * @return array<string,mixed>
     */
    protected static function getTarget(string $controllerName): ?array
    {
        if (key_exists($controllerName, self::$targets)) {
            // fixme introduce a custom hook to allow modifications (for custom themes)
            return self::$targets[$controllerName];
        }

        return null;
    }
}
