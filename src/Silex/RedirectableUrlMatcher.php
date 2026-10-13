<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Silex;

use Silex\Exception\SilexRemovedException;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher as BaseRedirectableUrlMatcher;

/**
 * Stub replacement for the removed `Silex\RedirectableUrlMatcher`.
 *
 * The Symfony parent is abstract and declares `redirect()`, so the stub must implement it to stay
 * instantiable-in-principle; it throws, like the constructor.
 *
 * @deprecated Use `spryker/router` instead.
 */
class RedirectableUrlMatcher extends BaseRedirectableUrlMatcher implements SprykerStubInterface
{
    /**
     * Variadic on purpose: every original call signature, `new RedirectableUrlMatcher($routes,
     * $context)` included, type-checks and still reaches this body and throws.
     *
     * @param mixed ...$arguments
     *
     * @throws \Silex\Exception\SilexRemovedException
     */
    public function __construct(mixed ...$arguments)
    {
        throw SilexRemovedException::forMember(static::class);
    }

    /**
     * @param string $path
     * @param string $route
     * @param string|null $scheme
     *
     * @throws \Silex\Exception\SilexRemovedException
     *
     * @return array<string, mixed>
     */
    public function redirect(string $path, string $route, ?string $scheme = null): array
    {
        throw SilexRemovedException::forMember(static::class . '::redirect()');
    }
}
