<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Silex\Exception;

use RuntimeException;

class SilexRemovedException extends RuntimeException
{
    protected const string MESSAGE_TEMPLATE = <<<'TXT'
%s is no longer functional.

Silex has been removed from Spryker. `spryker/silex` 3.x ships API-compatible stubs so that
existing type declarations and `use` statements keep resolving, but the Silex implementation is
gone. Migrate to \Spryker\Service\Container\ContainerInterface and the application-plugin stack
(\Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface).

If you genuinely still need a working Silex, pin `spryker/silex:^2.0.0`.
TXT;

    /**
     * @param string $member Fully qualified class name, optionally suffixed with `::method()`.
     *
     * @return self
     */
    public static function forMember(string $member): self
    {
        return new self(sprintf(static::MESSAGE_TEMPLATE, $member));
    }
}
