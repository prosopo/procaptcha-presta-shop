<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Settings;

use PrestaShop\PrestaShop\Core\Configuration\DataConfigurationInterface;
use PrestaShop\PrestaShop\Core\Form\FormDataProviderInterface;

final class SettingsDataProvider implements FormDataProviderInterface
{
    /**
     * @var DataConfigurationInterface
     */
    private $settingsConfiguration;

    public function __construct(DataConfigurationInterface $demoConfigurationTextDataConfiguration)
    {
        $this->settingsConfiguration = $demoConfigurationTextDataConfiguration;
    }

    public function getData(): array
    {
        return $this->settingsConfiguration->getConfiguration();
    }

    public function setData(array $data): array
    {
        return $this->settingsConfiguration->updateConfiguration($data);
    }
}
