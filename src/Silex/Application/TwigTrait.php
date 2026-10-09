<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Silex\Application;

/**
 * Stub replacement for the removed `Silex\Application\TwigTrait`.
 *
 * Deliberately empty. The real trait added methods to the application; reproducing them here would
 * risk colliding with a method the using class already declares, and every call would throw anyway
 * via {@link \Silex\Application::__call()}.
 *
 * @deprecated Silex has been removed. This trait exists only so that `use` statements resolve.
 */
trait TwigTrait
{
}
