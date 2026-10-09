<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Silex;

/**
 * Signature-faithful stub of the removed `Silex\ControllerProviderInterface`.
 *
 * @deprecated Use {@link \Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin} instead.
 */
interface ControllerProviderInterface
{
    /**
     * @param \Silex\Application $app
     *
     * @return \Silex\ControllerCollection
     */
    public function connect(Application $app);
}
