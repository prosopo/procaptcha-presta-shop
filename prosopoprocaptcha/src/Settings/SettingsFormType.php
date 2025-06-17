<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Settings;

use PrestaShopBundle\Form\Admin\Type\TranslatorAwareType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class SettingsFormType extends TranslatorAwareType
{
    const SECRET_KEY = 'secret_key';
    const SITE_KEY = 'site_key';
    const THEME = 'theme';
    const TYPE = 'type';
    const IS_ENABLED_FOR_AUTHORIZED = 'is_enabled_for_authorized';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(self::SECRET_KEY, PasswordType::class, [
                'label' => $this->trans('Your secret key', 'Modules.Prosopoprocaptcha.Admin'),
            ])
            ->add(self::SITE_KEY, TextType::class, [
                'label' => $this->trans('Your site key', 'Modules.Prosopoprocaptcha.Admin'),
            ])
            ->add(self::THEME, ChoiceType::class, [
                'label' => $this->trans('Theme', 'Modules.Prosopoprocaptcha.Admin'),
                'choices' => [
                    'light' => $this->trans('Light', 'Modules.Prosopoprocaptcha.Admin'),
                    'dark' => $this->trans('Dark', 'Modules.Prosopoprocaptcha.Admin'),
                ],
            ])
            ->add(self::TYPE, ChoiceType::class, [
                'label' => $this->trans('Type', 'Modules.Prosopoprocaptcha.Admin'),
                'choices' => [
                    'frictionless' => $this->trans('Frictionless', 'Modules.Prosopoprocaptcha.Admin'),
                    'image' => $this->trans('Image', 'Modules.Prosopoprocaptcha.Admin'),
                    'pow' => $this->trans('Proof of Work', 'Modules.Prosopoprocaptcha.Admin'),
                ],
            ])
            ->add(self::IS_ENABLED_FOR_AUTHORIZED, CheckboxType::class, [
                'label' => $this->trans('Require from authorized users', 'Modules.Prosopoprocaptcha.Admin'),
            ]);
    }
}
