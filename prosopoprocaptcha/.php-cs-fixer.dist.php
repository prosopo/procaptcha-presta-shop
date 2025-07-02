<?php

$config = new class extends PrestaShop\CodingStandards\CsFixer\Config {
    public function getRules(): array
    {
        return array_merge(
            parent::getRules(),
            [
                // custom fix to match the Prestashop validator requirements
                // https://github.com/PrestaShop/php-dev-tools/issues/80
                'blank_line_after_opening_tag' => false,
            ]
        );
    }
};

/** @var \Symfony\Component\Finder\Finder $finder */
$finder = $config->setUsingCache(true)->getFinder();
$finder->in(__DIR__)->exclude('vendor');

return $config;
