<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Settings;

use Io\Prosopo\Procaptcha\Views;
use Io\Prosopo\Procaptcha\Widget;
use PrestaShop\PrestaShop\Core\Form\FormHandlerInterface;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends FrameworkBundleAdminController
{
    private FormHandlerInterface $settingsDataHandler;
    private SettingsConfiguration $settingsConfiguration;
    private Widget $widget;
    private Views $views;

    public function __construct(
        FormHandlerInterface  $settingsDataHandler,
        SettingsConfiguration $settingsConfiguration,
        Widget                $widget,
        Views                 $views)
    {
        parent::__construct();

        $this->settingsDataHandler = $settingsDataHandler;
        $this->settingsConfiguration = $settingsConfiguration;
        $this->widget = $widget;
        $this->views = $views;
    }

    public function index(Request $request): Response
    {
        $form = $this->settingsDataHandler->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() &&
            $form->isValid()) {
            $errors = $this->settingsDataHandler->save($form->getData());

            if (empty($errors)) {
                $this->addFlash('success', $this->trans('Successful update.', 'Admin.Notifications.Success'));

                return $this->redirectToRoute('prosopo_procaptcha_settings');
            }

            $this->flashErrors($errors);
        }

        return $this->renderSettingsPage($form);
    }

    private function renderSettingsPage(FormInterface $form): Response
    {
        $siteKey = $this->settingsConfiguration->getField(SettingsConfiguration::FIELD_SITE_KEY);

        $widgetPreview = $siteKey ?
            $this->widget->renderWidget() :
            '';
        $widgetScripts = $siteKey ?
            $this->widget->renderWidgetScripts() :
            '';

        $args = [
            'settingsForm' => $form->createView(),
            'layoutTitle' => 'Prosopo Procaptcha',
            'help_link' => false,
            'layoutHeaderToolbarBtn' => [
                'website' => [
                    'href' => 'https://prosopo.io/',
                    'desc' => $this->trans('Visit Website', 'Modules.Prosopoprocaptcha.Admin'),
                    'target' => '_blank',
                    'icon' => 'link',
                    'class' => 'btn-outline-secondary',
                ],
                'docs' => [
                    'href' => 'https://docs.prosopo.io/en/wordpress-plugin/',
                    'desc' => $this->trans('Open Docs', 'Modules.Prosopoprocaptcha.Admin'),
                    'target' => '_blank',
                    'icon' => 'info',
                    'class' => 'btn-outline-secondary',
                ],
                'portal' => [
                    'href' => 'https://portal.prosopo.io/',
                    'desc' => $this->trans('Visit Portal', 'Modules.Prosopoprocaptcha.Admin'),
                    'target' => '_blank',
                    'icon' => 'key',
                    'class' => 'btn-outline-secondary',
                ],
            ],
            'headerTabContent' => sprintf('<div style="margin:-15px 20px 20px;">%s</div>',
                $this->trans('GDPR compliant, privacy friendly and better value captcha.', 'Modules.Prosopoprocaptcha.Admin')
            ),
            'widgetPreview' => $widgetPreview,
            'widgetScripts' => $widgetScripts,
        ];

        // fixme
        return $this->views->render('settings', $args);
    }
}
