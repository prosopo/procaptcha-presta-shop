<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha;

use Io\Prosopo\Procaptcha\Settings\SettingsConfiguration;

final class Widget
{
    public static function renderWidget(): string
    {
        return '<prosopo-procaptcha-presta-widget class="prosopo-procaptcha-presta-widget" style="display: block;">
    <div class="prosopo-procaptcha"></div>
</prosopo-procaptcha-presta-widget>';
    }

    public static function renderWidgetScripts(): string
    {
        $options=[
            'siteKey' => SettingsConfiguration::getField(SettingsConfiguration::FIELD_SITE_KEY),
            'theme' => SettingsConfiguration::getField(SettingsConfiguration::FIELD_THEME),
            'captchaType' => SettingsConfiguration::getField(SettingsConfiguration::FIELD_TYPE),
        ];

        // fixme migrate to static.
        return '<script type="text/javascript">
    window.procaptchaPrestaAttributes = {{ captchaOptions|json_encode|raw }}
</script>
<script type="text/javascript" async defer
        src="{{ asset('../modules/prosopoprocaptcha/dist/widget-integration.min.js') }}">
</script>';
    }
}
