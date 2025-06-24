<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha;

use Io\Prosopo\Procaptcha\Settings\SettingsConfiguration;
use Tools;
use Translate;
use function WPLake\Typed\bool;
use function WPLake\Typed\string;

final class Widget
{
    const SERVICE_SCRIPT_URL = 'https://js.prosopo.io/js/procaptcha.bundle.js';
    const API_URL = 'https://api.prosopo.io/siteverify';
    const TOKEN_FIELD_NAME = 'procaptcha-response';

    public static function renderWidget(): string
    {
        return '<prosopo-procaptcha-presta-widget class="prosopo-procaptcha-presta-widget" style="display: block;">
    <div class="prosopo-procaptcha"></div>
</prosopo-procaptcha-presta-widget>';
    }

    public static function renderWidgetScripts(): string
    {
        $options = [
            'siteKey' => SettingsConfiguration::getField(SettingsConfiguration::FIELD_SITE_KEY),
            'theme' => SettingsConfiguration::getField(SettingsConfiguration::FIELD_THEME),
            'captchaType' => SettingsConfiguration::getField(SettingsConfiguration::FIELD_TYPE),
        ];

        $jsonOptions = (string)json_encode($options);
        // fixme add version.
        $widgetIntegrationScript = __PS_BASE_URI__ . 'modules/prosopoprocaptcha/dist/widget-integration.min.js';

        return
            sprintf('<script type="module" async defer src="%s"></script>', self::SERVICE_SCRIPT_URL) .
            sprintf('<script type="text/javascript">window.procaptchaPrestaAttributes = %s</script>', $jsonOptions) .
            sprintf('<script type="text/javascript" async defer src="%s"></script>', $widgetIntegrationScript);
    }

    public static function verifyToken(?string $token = null): bool
    {
        $token = $token ?: self::getToken();

        $data = json_encode([
            'token' => $token,
            'secret' => SettingsConfiguration::getField(SettingsConfiguration::FIELD_SECRET_KEY),
        ]);

        $options = [
            'http' => [
                'header' => "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
            ],
        ];

        $context = stream_context_create($options);

        $result = file_get_contents(self::API_URL, false, $context);
        $response = json_decode($result, true);

        return bool($response, 'verified');
    }

    public static function getToken(string $fieldName = self::TOKEN_FIELD_NAME): string
    {
        $tokenValue = Tools::getValue($fieldName);

        return string($tokenValue);
    }

    public static function getValidationError(): string
    {
        return Translate::getModuleTranslation(
            'prosopoprocaptcha',
            'Please verify that you are human.',
            'Modules.Prosopoprocaptcha.Shop'
        );
    }
}
