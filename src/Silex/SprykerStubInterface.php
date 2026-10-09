<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Silex;

/**
 * Marker implemented by every stub `spryker/silex` ships in place of the removed Silex classes.
 *
 * Use it to detect stub mode instead of `class_exists()`, which is always true now:
 *
 *     if (is_a(\Silex\Application::class, \Silex\SprykerStubInterface::class, true)) {
 *         $this->markTestSkipped('Silex has been removed.');
 *     }
 */
interface SprykerStubInterface
{
}
