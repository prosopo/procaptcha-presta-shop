<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Settings;

use PrestaShop\PrestaShop\Core\Configuration\DataConfigurationInterface;
use PrestaShop\PrestaShop\Core\ConfigurationInterface;

final class SettingsConfiguration implements DataConfigurationInterface
{
    const PREFIX = 'PROSOPO_PROCAPTCHA_';
    const FIELD_SECRET_KEY = self::PREFIX . 'SECRET_KEY';
    const FIELD_SITE_KEY = self::PREFIX . 'SITE_KEY';
    const FIELD_THEME = self::PREFIX . 'THEME';
    const FIELD_TYPE = self::PREFIX . 'TYPE';
    const FIELD_IS_ENABLED_FOR_AUTHORIZED = self::PREFIX . 'IS_ENABLED_FOR_AUTHORIZED';

    /**
     * @var array<string,string>
     */
    const RELATIONS = [
        SettingsFormType::SECRET_KEY => self::FIELD_SECRET_KEY,
        SettingsFormType::SITE_KEY => self::FIELD_SITE_KEY,
        SettingsFormType::THEME => self::FIELD_THEME,
        SettingsFormType::TYPE => self::FIELD_TYPE,
        SettingsFormType::IS_ENABLED_FOR_AUTHORIZED => self::FIELD_IS_ENABLED_FOR_AUTHORIZED,
    ];

    /**
     * @var ConfigurationInterface
     */
    private $configuration;

    public function __construct(ConfigurationInterface $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getConfiguration(): array
    {
        return array_map(function ($value) {
            return $this->configuration->get($value);
        }, self::RELATIONS);
    }

    public function updateConfiguration(array $configuration): array
    {
        $errors = [];

        if ($this->validateConfiguration($configuration)) {
            foreach (self::RELATIONS as $key => $value) {
                $this->configuration->set($value, $configuration[$key]);
            }
        }

        return $errors;
    }

    public function validateConfiguration(array $configuration): bool
    {
        foreach (self::RELATIONS as $key => $value) {
            if (key_exists($key, $configuration)) {
                continue;
            }

            return false;
        }

        return true;
    }
}
