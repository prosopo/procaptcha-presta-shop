<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Settings;

use Io\Prosopo\Procaptcha\Form\PasswordType;
use PrestaShopBundle\Form\Admin\Type\SwitchType;
use PrestaShopBundle\Form\Admin\Type\TranslatorAwareType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class SettingsFormType extends TranslatorAwareType
{
    const SECRET_KEY = 'secret_key';
    const SITE_KEY = 'site_key';
    const THEME = 'theme';
    const TYPE = 'type';
    const IS_ON_REGISTRATION_FORM = 'is_on_registration_form';
    const IS_ON_LOGIN_FORM = 'is_on_login_form';
    const IS_ON_PASSWORD_RECOVERY_FORM = 'is_on_password_recovery_form';
    const IS_ON_CONTACT_FORM = 'is_on_contact_form';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $trueFalseChoices = [
            $this->trans('No', 'Modules.Prosopoprocaptcha.Admin') => '0',
            $this->trans('Yes', 'Modules.Prosopoprocaptcha.Admin') => '1',
        ];

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
            ->add(self::IS_ON_REGISTRATION_FORM, SwitchType::class, [
                'label' => $this->trans('Registration form protection', 'Modules.Prosopoprocaptcha.Admin'),
                'required' => false,
                'choices' => $trueFalseChoices,
            ])
            ->add(self::IS_ON_LOGIN_FORM, SwitchType::class, [
                'label' => $this->trans('Login form protection', 'Modules.Prosopoprocaptcha.Admin'),
                'required' => false,
                'choices' => $trueFalseChoices,
            ])
            ->add(self::IS_ON_PASSWORD_RECOVERY_FORM, SwitchType::class, [
                'label' => $this->trans('Password recovery form protection', 'Modules.Prosopoprocaptcha.Admin'),
                'required' => false,
                'choices' => $trueFalseChoices,
            ])
            ->add(self::IS_ON_CONTACT_FORM, SwitchType::class, [
                'label' => $this->trans('Contact form protection', 'Modules.Prosopoprocaptcha.Admin'),
                'required' => false,
                'choices' => $trueFalseChoices,
            ]);
    }
}
