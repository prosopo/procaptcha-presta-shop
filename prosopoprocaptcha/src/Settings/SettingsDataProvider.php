<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Settings;

if (!defined('_PS_VERSION_')) {
    exit;
}

use PrestaShop\PrestaShop\Core\Configuration\DataConfigurationInterface;
use PrestaShop\PrestaShop\Core\Form\FormDataProviderInterface;
final class SettingsDataProvider implements FormDataProviderInterface
{
    private DataConfigurationInterface $settingsConfiguration;

    public function __construct(DataConfigurationInterface $settingsConfiguration)
    {
        $this->settingsConfiguration = $settingsConfiguration;
    }

    /**
     * @return array<int|string, mixed>
     */
    public function getData(): array
    {
        return $this->settingsConfiguration->getConfiguration();
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return array<int|string, mixed>
     */
    public function setData(array $data): array
    {
        return $this->settingsConfiguration->updateConfiguration($data);
    }
}
