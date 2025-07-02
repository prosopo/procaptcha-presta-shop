<?php
/**
 * Copyright 2021-2025 Prosopo (UK) Ltd.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author Prosopo <team@prosopo.io>
 * @copyright Prosopo
 * @license Apache-2.0
 */

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Settings;

if (!defined('_PS_VERSION_')) {
    exit;
}

use Io\Prosopo\Procaptcha\Views;
use Io\Prosopo\Procaptcha\Widget\Widget;
use PrestaShop\PrestaShop\Core\Form\FormHandlerInterface;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use function WPLake\Typed\arr;

class SettingsController extends FrameworkBundleAdminController
{
    private FormHandlerInterface $settingsDataHandler;
    private SettingsConfiguration $settingsConfiguration;
    private Views $views;

    public function __construct(
        FormHandlerInterface $settingsDataHandler,
        SettingsConfiguration $settingsConfiguration,
        Views $views)
    {
        parent::__construct();

        $this->settingsDataHandler = $settingsDataHandler;
        $this->settingsConfiguration = $settingsConfiguration;
        $this->views = $views;
    }

    public function index(Request $request): Response
    {
        $form = $this->settingsDataHandler->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()
            && $form->isValid()) {
            $formData = arr($form->getData());
            $errors = $this->settingsDataHandler->save($formData);

            if (empty($errors)) {
                $this->addFlash('success', $this->trans('Successful update.', 'Admin.Notifications.Success'));

                return $this->redirectToRoute('prosopo_procaptcha_settings');
            }

            $this->flashErrors($errors);
        }

        return $this->renderSettingsPage($form);
    }

    /**
     * @phpstan-param FormInterface<array<string,mixed>> $form
     */
    private function renderSettingsPage(FormInterface $form): Response
    {
        $siteKey = $this->settingsConfiguration::getField(SettingsConfiguration::FIELD_SITE_KEY);

        $widgetPreview = $siteKey ?
            Widget::renderWidget() :
            '';
        $widgetScripts = $siteKey ?
            Widget::renderWidgetScripts() :
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

        $html = $this->views->render('settings', $args);

        return new Response($html);
    }
}
