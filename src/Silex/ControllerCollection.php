<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Silex;

use Silex\Exception\SilexRemovedException;

/**
 * Stub replacement for the removed `Silex\ControllerCollection`.
 *
 * The `@method` block declares the routing verbs this repository still calls. They reach __call()
 * and throw; the declarations only keep the callers type-checking.
 *
 * @method \Silex\Controller match(string $pattern, mixed $to = null)
 *
 * @deprecated Use {@link \Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin} instead.
 */
class ControllerCollection implements SprykerStubInterface
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

    /**
     * @param string $name
     * @param array<int, mixed> $arguments
     *
     * @throws \Silex\Exception\SilexRemovedException
     *
     * @return mixed
     */
    public function __call($name, array $arguments)
    {
        throw SilexRemovedException::forMember(static::class . '::' . $name . '()');
    }
}
