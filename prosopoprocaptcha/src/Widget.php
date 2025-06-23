<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha;

use Io\Prosopo\Procaptcha\Settings\SettingsConfiguration;

final class Widget
{
    private string $viewsFolderName;
    private Views $views;
    private SettingsConfiguration $settingsConfiguration;

    public function __construct(string $viewsFolderName, Views $views, SettingsConfiguration $settingsConfiguration)
    {
        $this->viewsFolderName = $viewsFolderName;
        $this->views = $views;
        $this->settingsConfiguration = $settingsConfiguration;
    }

    public function renderWidget(): string
    {
        return $this->render('widget');
    }

    public function renderWidgetScripts(): string
    {
        return $this->render('widget-scripts', [
            'captchaOptions' => [
                'siteKey' => $this->settingsConfiguration->getField(SettingsConfiguration::FIELD_SITE_KEY),
                'theme' => $this->settingsConfiguration->getField(SettingsConfiguration::FIELD_THEME),
                'captchaType' => $this->settingsConfiguration->getField(SettingsConfiguration::FIELD_TYPE),
            ],
        ]);
    }

    /**
     * @param array<string,mixed> $arguments
     */
    protected function render(string $viewName, array $arguments = []): string
    {
        $fullViewName = sprintf('%s/%s', $this->viewsFolderName, $viewName);

        return $this->views->render($fullViewName, $arguments);
    }
}
