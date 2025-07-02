<?php

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
