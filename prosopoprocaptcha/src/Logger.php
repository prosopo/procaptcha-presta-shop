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

namespace Io\Prosopo\Procaptcha;

if (!defined('_PS_VERSION_')) {
    exit;
}

final class Logger
{
    const LEVEL_INFO = 1;
    const LEVEL_WARNING = 2;

    public static int $minimumLevel = self::LEVEL_INFO;

    public static function log(int $level, string $message): void
    {
        if ($level >= self::$minimumLevel) {
            \PrestaShopLogger::addLog($message, $level);
        }
    }
}
