<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Form;

if (!defined('_PS_VERSION_')) {
    exit;
}

use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

final class PasswordType extends \Symfony\Component\Form\Extension\Core\Type\PasswordType
{
    /**
     * @param array<string, mixed> $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        // omit the parent call,
        // otherwise it removes the existing value if the form wasn't just submitted.
    }
}
