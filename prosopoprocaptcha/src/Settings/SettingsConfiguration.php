<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Settings;

use Configuration;
use PrestaShop\PrestaShop\Core\Configuration\DataConfigurationInterface;
use PrestaShop\PrestaShop\Core\Domain\Configuration\ShopConfigurationInterface;
use function WPLake\Typed\boolExtended;
use function WPLake\Typed\string;

final class SettingsConfiguration implements DataConfigurationInterface
{
    const PREFIX = 'PROSOPO_PROCAPTCHA_';
    const FIELD_SECRET_KEY = self::PREFIX . 'SECRET_KEY';
    const FIELD_SITE_KEY = self::PREFIX . 'SITE_KEY';
    const FIELD_THEME = self::PREFIX . 'THEME';
    const FIELD_TYPE = self::PREFIX . 'TYPE';
    const FIELD_IS_ON_REGISTRATION_FORM = self::PREFIX . 'IS_ON_REGISTRATION_FORM';

    /**
     * @var array<string,array{formName:string,coerce: callable(mixed $value): mixed}>
     */
    private array $relations;

    private ShopConfigurationInterface $configuration;

    public function __construct(ShopConfigurationInterface $configuration)
    {
        $this->configuration = $configuration;

        $this->relations = self::getRelations();
    }

    /**
     * @return mixed
     */
    public static function getField(string $fieldName)
    {
        $relations = self::getRelations();

        if (key_exists($fieldName, $relations)) {
            $value = Configuration::get($fieldName);
            $relation = $relations[$fieldName];

            return $relation['coerce']($value);
        }

        return null;
    }

    /**
     * @return array<string,array{formName:string,coerce: callable(mixed $value): mixed}>
     */
    protected static function getRelations(): array
    {
        return [
            self::FIELD_SECRET_KEY => ['formName' => SettingsFormType::SECRET_KEY,
                'coerce' => fn($value) => string($value),
            ],
            self::FIELD_SITE_KEY => [
                'formName' => SettingsFormType::SITE_KEY,
                'coerce' => fn($value) => string($value),
            ],
            self::FIELD_THEME => [
                'formName' => SettingsFormType::THEME,
                'coerce' => fn($value) => string($value),
            ],
            self::FIELD_TYPE => [
                'formName' => SettingsFormType::TYPE,
                'coerce' => fn($value) => string($value),
            ],
            self::FIELD_IS_ON_REGISTRATION_FORM => [
                'formName' => SettingsFormType::IS_ON_REGISTRATION_FORM,
                'coerce' => fn($value) => boolExtended($value),
            ],
        ];
    }

    /**
     * Converts data from the DB to the form-related format.
     *
     * @return array<string,mixed> [formName => value]
     */
    public function getConfiguration(): array
    {
        $configuration = [];

        foreach ($this->relations as $fieldName => $relation) {
            $formName = $relation['formName'];
            $value = $this->configuration->get($fieldName);

            $configuration[$formName] = $relation['coerce']($value);
        }

        return $configuration;
    }

    /**
     * Converts data from the form to the DB-related format.
     *
     * @param array<string, mixed> $configuration
     *
     * @return string[] Errors.
     */
    public function updateConfiguration(array $configuration): array
    {
        $errors = [];

        if ($this->validateConfiguration($configuration)) {
            foreach ($this->relations as $fieldName => $relation) {
                $formName = $relation['formName'];
                $rawValue = $configuration[$formName];
                $value = $relation['coerce']($rawValue);

                $this->configuration->set($fieldName, $value);
            }
        }

        return $errors;
    }

    /**
     * @param array<string, mixed> $configuration
     *
     * @return bool
     */
    public function validateConfiguration(array $configuration): bool
    {
        foreach ($this->relations as $relation) {
            $formName = $relation['formName'];

            if (key_exists($formName, $configuration)) {
                continue;
            }

            return false;
        }

        return true;
    }

    public function removeAllFields(): void
    {
        foreach (array_keys($this->relations) as $fieldName) {
            $this->configuration->remove($fieldName);
        }
    }
}
