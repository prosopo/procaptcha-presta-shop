<?php
/**
 * Prosopo Procaptcha Module
 *
 * GDPR compliant, privacy-friendly, and better-value CAPTCHA for your PrestaShop website.
 *
 * @author Prosopo <team@prosopo.io>
 * @copyright Prosopo
 * @license MIT License
 */

declare(strict_types=1);

if (!defined('_PS_VERSION_')) {
    exit;
}

final class ProsopoProcaptcha extends Module
{
    public function __construct()
    {
        $this->name = 'prosopoprocaptcha';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Prosopo';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '8.0.0',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->trans('Prosopo Procaptcha', [], 'Modules.Prosopoprocaptcha.Admin');
        $this->description = $this->trans('GDPR compliant, privacy-friendly, and better-value CAPTCHA for your PrestaShop website.', [], 'Modules.Prosopoprocaptcha.Admin');

        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall?', [], 'Modules.Prosopoprocaptcha.Admin');
    }

    public function install(): bool
    {
        return parent::install() &&
            $this->registerHook('displayHeader');
    }

    public function uninstall(): bool
    {
        return parent::uninstall();
    }

    public function hookDisplayHeader(): string
    {
        return '<div class="alert alert-info">Prosopo Procaptcha is active!</div>';
    }

    // admin config page content.
    public function getContent(): string
    {
        return '<div class="panel"><div class="panel-heading">Prosopo Procaptcha</div><div class="panel-body">GDPR compliant, privacy-friendly, and better-value CAPTCHA for your PrestaShop website.</div></div>';
    }
}

