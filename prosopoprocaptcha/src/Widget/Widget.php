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

use function WPLake\Typed\bool;
use function WPLake\Typed\string;

/**
 * Important: This class and its public methods are mentioned in the Docs as 'public module APIs',
 * be sure to keep back compatibility if you make any structure changes.
 */
final class Widget
{
    private const SERVICE_SCRIPT_URL = 'https://js.prosopo.io/js/procaptcha.bundle.js';
    private const API_URL = 'https://api.prosopo.io/siteverify';
    private const TOKEN_FIELD_NAME = 'procaptcha-response';
    private const WIDGET_SCRIPT = 'modules/prosopoprocaptcha/views/js/widget-integration.min.js';

    public static function renderWidget(): string
    {
        return sprintf('<div class="prosopo-procaptcha__row" 
style="margin: 0 0 20px;display:flex;justify-content: center;">
<div class="prosopo-procaptcha__field" style="max-width:300px; width: 100%%;">
%s
</div>
</div>',
            self::renderWidgetElement()
        );
    }

    public static function renderWidgetElement(): string
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

        $jsonOptions = (string) json_encode($options);

        $widgetIntegrationScript = sprintf('%s?ver=%s',
            __PS_BASE_URI__ . self::WIDGET_SCRIPT,
            \ProsopoProcaptcha::VERSION
        );

        return
            sprintf('<script type="module" async defer src="%s"></script>', self::SERVICE_SCRIPT_URL) .
            sprintf('<script type="text/javascript">window.procaptchaPrestaAttributes = %s</script>', $jsonOptions) .
            sprintf('<script type="text/javascript" async defer src="%s"></script>', $widgetIntegrationScript);
    }

    public static function verifyToken(?string $token = null): bool
    {
        $token = $token ?: self::getToken();

        // skip if the token is missing.
        if (0 === strlen($token)) {
            return false;
        }

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

        if (is_string($result)) {
            $response = json_decode($result, true);

            return bool($response, 'verified');
        }

        return false;
    }

    public static function getValidationError(): string
    {
        $error = \Translate::getModuleTranslation(
            'prosopoprocaptcha',
            'Please verify that you are human.',
            'Modules.Prosopoprocaptcha.Shop'
        );

        return string($error);
    }

    protected static function getToken(string $fieldName = self::TOKEN_FIELD_NAME): string
    {
        $tokenValue = \Tools::getValue($fieldName);

        return string($tokenValue);
    }
}
