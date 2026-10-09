<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Silex\Provider;

use Silex\Application;
use Silex\Exception\SilexRemovedException;
use Silex\ServiceProviderInterface;
use Silex\SprykerStubInterface;

/**
 * Stub replacement for the removed `Silex\Provider\FormServiceProvider`.
 *
 * The constructor stays usable on purpose - `Spryker\Zed\Testify\Bootstrap\ZedBootstrap` builds a
 * list of these eagerly before deciding what to do with them, and merely holding one is harmless.
 * The throw happens where Silex behaviour would actually have occurred: register() and boot().
 *
 * @deprecated Use {@link \Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface} instead.
 */
class FormServiceProvider implements ServiceProviderInterface, SprykerStubInterface
{
    /**
     * @param \Silex\Application $app
     *
     * @throws \Silex\Exception\SilexRemovedException
     *
     * @return void
     */
    public function register(Application $app)
    {
        throw SilexRemovedException::forMember(static::class . '::register()');
    }

    /**
     * @param \Silex\Application $app
     *
     * @throws \Silex\Exception\SilexRemovedException
     *
     * @return void
     */
    public function boot(Application $app)
    {
        throw SilexRemovedException::forMember(static::class . '::boot()');
    }
}
