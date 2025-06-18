<?php

declare(strict_types=1);

namespace Io\Prosopo\Procaptcha\Settings;

use PrestaShop\PrestaShop\Core\Form\FormHandlerInterface;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends FrameworkBundleAdminController
{
    private FormHandlerInterface $settingsDataHandler;

    public function __construct(FormHandlerInterface $settingsDataHandler)
    {
        parent::__construct();

        $this->settingsDataHandler = $settingsDataHandler;
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

        return $this->render('@Modules/prosopoprocaptcha/views/admin/settings.twig', [
            'settingsForm' => $form->createView()
        ]);
    }
}
