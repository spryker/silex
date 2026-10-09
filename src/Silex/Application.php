<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Silex;

use Pimple;
use Silex\Exception\SilexRemovedException;

/**
 * Stub replacement for the removed `Silex\Application`.
 *
 * The container half stays alive on purpose: the real `Silex\Application` extended `\Pimple`,
 * which `spryker/container` already replaces with `\Spryker\Service\Container\Container`. Service
 * access (`$app['foo']`, `set()`, `extend()`, `remove()`) therefore keeps working, so a legacy
 * service-provider body and `\Spryker\Shared\Kernel\Communication\ApplicationProxy` still behave.
 *
 * Everything that was Silex itself - routing, the HTTP kernel, the event hooks - throws.
 *
 * One caveat, stated rather than hidden: the container inherits `get()`, `set()`, `has()`,
 * `remove()`, `extend()` and `configure()`. Silex's *routing* `get($pattern, $to)` therefore does
 * not reach __call() - it resolves to the container's `get($id)` and fails as an unknown service
 * instead of a SilexRemovedException. The container semantics are the ones worth keeping, and the
 * routing methods are dead code, so the collision is accepted. Every other routing verb
 * (match/post/put/delete/options/patch/mount/run) does throw.
 *
 * @deprecated Use {@link \Spryker\Service\Container\ContainerInterface} and
 *   {@link \Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface} instead.
 */
class Application extends Pimple implements SprykerStubInterface
{
    /**
     * @param \Silex\ServiceProviderInterface $provider
     * @param array<string, mixed> $values
     *
     * @throws \Silex\Exception\SilexRemovedException
     *
     * @return void
     */
    public function register(ServiceProviderInterface $provider, array $values = [])
    {
        throw SilexRemovedException::forMember(static::class . '::register()');
    }

    /**
     * @throws \Silex\Exception\SilexRemovedException
     *
     * @return void
     */
    public function boot()
    {
        throw SilexRemovedException::forMember(static::class . '::boot()');
    }

    /**
     * Every remaining method of the removed `Silex\Application` - match(), get(), post(), put(),
     * delete(), options(), patch(), on(), before(), after(), finish(), abort(), error(), view(),
     * flush(), redirect(), stream(), escape(), json(), sendFile(), mount(), run(), handle(),
     * terminate() - lands here.
     *
     * A catch-all keeps this stub honest: it cannot silently answer a call it no longer implements,
     * and it stays correct if a project used a Silex method this repository never did.
     *
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
