<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Settings;

use Io\Prosopo\Procaptcha\Form\PasswordType;
use PrestaShopBundle\Form\Admin\Type\SwitchType;
use PrestaShopBundle\Form\Admin\Type\TranslatorAwareType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
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
                'required' => true,
                'always_empty' => false,
            ])
            ->add(self::SITE_KEY, TextType::class, [
                'label' => $this->trans('Your site key', 'Modules.Prosopoprocaptcha.Admin'),
                'required' => true,
            ])
            ->add(self::THEME, ChoiceType::class, [
                'label' => $this->trans('Theme', 'Modules.Prosopoprocaptcha.Admin'),
                'required' => true,
                'choices' => [
                    $this->trans('Light', 'Modules.Prosopoprocaptcha.Admin') => 'light',
                    $this->trans('Dark', 'Modules.Prosopoprocaptcha.Admin') => 'dark',
                ],
            ])
            ->add(self::TYPE, ChoiceType::class, [
                'label' => $this->trans('Type', 'Modules.Prosopoprocaptcha.Admin'),
                'required' => true,
                'choices' => [
                    $this->trans('Frictionless', 'Modules.Prosopoprocaptcha.Admin') => 'frictionless',
                    $this->trans('Image', 'Modules.Prosopoprocaptcha.Admin') => 'image',
                    $this->trans('Proof of Work', 'Modules.Prosopoprocaptcha.Admin') => 'pow',
                ],
            ])
            ->add(self::IS_ENABLED_FOR_AUTHORIZED, SwitchType::class, [
                'label' => $this->trans('Require from authorized users', 'Modules.Prosopoprocaptcha.Admin'),
                'required' => false,
                'choices' => [
                    $this->trans('No', 'Modules.Prosopoprocaptcha.Admin') => '0',
                    $this->trans('Yes', 'Modules.Prosopoprocaptcha.Admin') => '1',
                ],
            ]);
    }
}
