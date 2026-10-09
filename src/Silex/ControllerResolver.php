<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Silex;

use Silex\Exception\SilexRemovedException;
use Symfony\Component\HttpKernel\Controller\ControllerResolver as BaseControllerResolver;

/**
 * Stub replacement for the removed `Silex\ControllerResolver`.
 *
 * Extends the Symfony resolver exactly as the real Silex class did. That is load-bearing rather
 * than cosmetic: `Spryker\{Zed,Yves,Glue}\Kernel\ControllerResolver\*FragmentControllerResolver`
 * override `protected function createController(string $controller): callable`, which is declared
 * on the *Symfony* class. Dropping the parent would silently turn those overrides into new
 * methods instead of a signature mismatch.
 *
 * @deprecated Use `spryker/router` instead.
 */
class ControllerResolver extends BaseControllerResolver implements SprykerStubInterface
{
    /**
     * Declared without parameters on purpose: PHP silently ignores extra arguments passed to a
     * userland function, so every original call signature still reaches this body and throws.
     *
     * @throws \Silex\Exception\SilexRemovedException
     */
    public function __construct()
    {
        throw SilexRemovedException::forMember(static::class);
    }
}
