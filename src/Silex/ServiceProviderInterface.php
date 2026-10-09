<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Silex;

/**
 * Signature-faithful stub of the removed `Silex\ServiceProviderInterface`.
 *
 * The method signatures are reproduced exactly so that existing implementations keep declaring a
 * compatible signature - the stub imposes no constraint that the real interface did not.
 *
 * @deprecated Use {@link \Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface} instead.
 */
interface ServiceProviderInterface
{
    /**
     * Registers services on the given app.
     *
     * Deliberately carries no `@return`, exactly as the removed silexphp interface did:
     * `ExternalMethodExtensionReturnTypeRule` reads the `@return` of a method's original
     * declaration and, when it finds one, demands a native return type from every implementer -
     * 107 of them for this interface.
     */
    public function register(Application $app);

    /**
     * Bootstraps the application.
     *
     * Carries no `@return` for the same reason as `register()`.
     */
    public function boot(Application $app);
}
