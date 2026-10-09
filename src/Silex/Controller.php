<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Silex;

use Silex\Exception\SilexRemovedException;

/**
 * Stub replacement for the removed `Silex\Controller`.
 *
 * Kept declarable so that type declarations referring to it keep resolving. Constructing one is
 * already asking Silex to route, so the constructor throws.
 *
 * The `@method` block below mirrors the removed silexphp class, which forwarded these calls to
 * `Silex\Route` through `__call()` and documented them here so that static analysis knows they are
 * valid. Without it PHPStan reports "Call to an undefined method" at every `->assert()` chain in the
 * route providers. Runtime behaviour is unchanged - `__call()` still throws.
 *
 * @method \Silex\Controller assert(string $variable, string $regexp)
 * @method \Silex\Controller value(string $variable, mixed $default)
 * @method \Silex\Controller convert(string $variable, mixed $callback)
 * @method \Silex\Controller method(string $method)
 * @method \Silex\Controller requireHttp()
 * @method \Silex\Controller requireHttps()
 * @method \Silex\Controller before(mixed $callback)
 * @method \Silex\Controller after(mixed $callback)
 *
 * @deprecated Use {@link \Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin} instead.
 */
class Controller implements SprykerStubInterface
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
