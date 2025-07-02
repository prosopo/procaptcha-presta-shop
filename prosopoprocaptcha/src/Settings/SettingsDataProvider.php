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
