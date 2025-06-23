<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha;

use Twig\Environment;

final class Views
{
    private string $viewsDir;
    private Environment $twig;

    public function __construct(string $viewsDir, Environment $twig)
    {
        $this->viewsDir = $viewsDir;
        $this->twig = $twig;
    }

    /**
     * @param array<string,mixed> $arguments
     */
    public function render(string $viewName, array $arguments = []): string
    {
        $viewPath = sprintf('%s/%s.html.twig', $this->viewsDir, $viewName);

        return $this->twig->render($viewPath, $arguments);
    }
}
