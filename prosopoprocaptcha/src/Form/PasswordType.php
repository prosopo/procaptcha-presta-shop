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

namespace Io\Prosopo\Procaptcha\Form;

if (!defined('_PS_VERSION_')) {
    exit;
}

use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

final class PasswordType extends \Symfony\Component\Form\Extension\Core\Type\PasswordType
{
    /**
     * @phpstan-param FormInterface<array<string,mixed>> $form
     *
     * @param array<string, mixed> $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        // omit the parent call,
        // otherwise it removes the existing value if the form wasn't just submitted.
    }
}
