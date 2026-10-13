<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Silex;

use Pimple;
use Silex\Exception\SilexRemovedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

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
 * The `@method` block below declares the members of the removed silexphp class that this
 * repository still calls, including those its `UrlGeneratorTrait` and `TwigTrait` added. They all
 * reach __call() and throw; the declarations only keep the callers type-checking.
 *
 * @method void before(mixed $callback, int $priority = 0)
 * @method void after(mixed $callback, int $priority = 0)
 * @method void finish(mixed $callback, int $priority = 0)
 * @method \Symfony\Component\HttpFoundation\RedirectResponse redirect(string $url, int $status = 302)
 * @method \Silex\Application mount(string $prefix, mixed $controllers)
 * @method string path(string $route, array<string, mixed> $parameters = [])
 * @method string url(string $route, array<string, mixed> $parameters = [])
 * @method string renderView(string $view, array<string, mixed> $parameters = [])
 * @method \Symfony\Component\HttpFoundation\Response render(string $view, array<string, mixed> $parameters = [], ?\Symfony\Component\HttpFoundation\Response $response = null)
 *
 * @deprecated Use {@link \Spryker\Service\Container\ContainerInterface} and
 *   {@link \Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface} instead.
 */
class Application extends Pimple implements HttpKernelInterface, SprykerStubInterface
{
    public const int EARLY_EVENT = 512;

    public const int LATE_EVENT = -512;

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
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param int $type
     * @param bool $catch
     *
     * @throws \Silex\Exception\SilexRemovedException
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, int $type = self::MAIN_REQUEST, bool $catch = true): Response
    {
        throw SilexRemovedException::forMember(static::class . '::handle()');
    }

    /**
     * Every remaining method of the removed `Silex\Application` - match(), get(), post(), put(),
     * delete(), options(), patch(), on(), before(), after(), finish(), abort(), error(), view(),
     * flush(), redirect(), stream(), escape(), json(), sendFile(), mount(), run(),
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
