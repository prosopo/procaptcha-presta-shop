<?php
declare(strict_types=1);

/**
 * Prosopo Procaptcha World Module
 *
 * GDPR compliant, privacy-friendly, and better-value CAPTCHA for your PrestaShop website.
 *
 * @author Prosopo <team@prosopo.io>
 * @copyright Prosopo
 * @license MIT License
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class ProsopoProcaptcha extends Module
{
    public function __construct()
    {
        $this->name = 'helloworld';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Your Name';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7.0.0',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Hello World');
        $this->description = $this->l('A simple module to display Hello World.');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
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
        return '<div class="alert alert-info">Hello World from my first PrestaShop module!</div>';
    }

    public function getContent(): string
    {
        return '<div class="panel"><div class="panel-heading">Hello World</div><div class="panel-body">This is a simple Hello World module for PrestaShop.</div></div>';
    }
}
