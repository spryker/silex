<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Silex;

use Codeception\Test\Unit;
use Silex\Application;
use Silex\Controller;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Silex\ControllerResolver;
use Silex\Exception\SilexRemovedException;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\RedirectableUrlMatcher;
use Silex\ServiceProviderInterface;
use Silex\SprykerStubInterface;
use Spryker\Service\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Silex
 * @group SilexStubTest
 * Add your own group annotations below this line
 */
class SilexStubTest extends Unit
{
    /**
     * Every symbol this repository referenced before Silex was removed. If one of these stops
     * resolving, a `use Silex\...` somewhere in core becomes a fatal error.
     *
     * @return array<int, array<int, string>>
     */
    public function silexSymbolProvider(): array
    {
        return [
            [Application::class],
            [ServiceProviderInterface::class],
            [ControllerProviderInterface::class],
            [ControllerResolver::class],
            [Controller::class],
            [ControllerCollection::class],
            [RedirectableUrlMatcher::class],
            [TwigServiceProvider::class],
            [FormServiceProvider::class],
            [ValidatorServiceProvider::class],
            [ServiceControllerServiceProvider::class],
            [HttpFragmentServiceProvider::class],
            [SessionServiceProvider::class],
            ['Silex\Application\TwigTrait'],
            ['Silex\Application\TranslationTrait'],
            ['Silex\Application\UrlGeneratorTrait'],
        ];
    }

    /**
     * @dataProvider silexSymbolProvider
     *
     * @param string $symbol
     *
     * @return void
     */
    public function testSilexSymbolIsDeclarable(string $symbol): void
    {
        // Act & Assert
        $this->assertTrue(
            class_exists($symbol) || interface_exists($symbol) || trait_exists($symbol),
            sprintf('%s must stay declarable so that existing `use` statements keep resolving.', $symbol),
        );
    }

    /**
     * The whole point of the stub: the container half of `Silex\Application` keeps working, because
     * `\Spryker\Shared\Kernel\Communication\ApplicationProxy` extends it and Testify constructs it.
     *
     * @return void
     */
    public function testApplicationIsConstructableAndBehavesAsAContainer(): void
    {
        // Arrange
        $application = new Application();

        // Act
        $application->set('foo', 'bar');

        // Assert
        $this->assertInstanceOf(ContainerInterface::class, $application);
        $this->assertTrue($application->has('foo'));
        $this->assertSame('bar', $application->get('foo'));
    }

    public function testApplicationConstructorAcceptsInitialServicesLikeSilexDid(): void
    {
        // Act
        $application = new Application(['foo' => 'bar']);

        // Assert
        $this->assertSame('bar', $application->get('foo'));
    }

    public function testApplicationRegisterThrows(): void
    {
        // Assert
        $this->expectException(SilexRemovedException::class);

        // Act
        (new Application())->register(new TwigServiceProvider());
    }

    public function testApplicationBootThrows(): void
    {
        // Assert
        $this->expectException(SilexRemovedException::class);

        // Act
        (new Application())->boot();
    }

    /**
     * @return array<int, array<int, string>>
     */
    public function removedApplicationMethodProvider(): array
    {
        return [
            ['match'], ['post'], ['put'], ['delete'], ['options'], ['patch'],
            ['on'], ['before'], ['after'], ['finish'], ['abort'], ['error'],
            ['view'], ['flush'], ['redirect'], ['stream'], ['escape'], ['json'],
            ['sendFile'], ['mount'], ['run'], ['terminate'],
        ];
    }

    /**
     * @dataProvider removedApplicationMethodProvider
     *
     * @param string $method
     *
     * @return void
     */
    public function testRemovedApplicationMethodThrows(string $method): void
    {
        // Assert
        $this->expectException(SilexRemovedException::class);

        // Act
        (new Application())->$method();
    }

    /**
     * The original class implemented `HttpKernelInterface`, so `handle()` is declared rather than
     * left to `__call()`, and takes the interface's arguments.
     *
     * @return void
     */
    public function testApplicationHandleThrows(): void
    {
        // Assert
        $this->expectException(SilexRemovedException::class);

        // Act
        (new Application())->handle(Request::create('/'));
    }

    public function testExceptionMessageNamesTheMemberAndTheMigrationPath(): void
    {
        // Act
        try {
            (new Application())->boot();
        } catch (SilexRemovedException $exception) {
            // Assert
            $this->assertStringContainsString('Silex\Application::boot()', $exception->getMessage());
            $this->assertStringContainsString('ContainerInterface', $exception->getMessage());
            $this->assertStringContainsString('spryker/silex:^2.0.0', $exception->getMessage());

            return;
        }

        $this->fail('Expected a SilexRemovedException.');
    }

    /**
     * @return array<int, array<int, string>>
     */
    public function nonConstructableStubProvider(): array
    {
        return [
            [Controller::class],
            [ControllerCollection::class],
            [ControllerResolver::class],
            [RedirectableUrlMatcher::class],
        ];
    }

    /**
     * @dataProvider nonConstructableStubProvider
     *
     * @param string $className
     *
     * @return void
     */
    public function testConstructingABehaviouralStubThrows(string $className): void
    {
        // Assert
        $this->expectException(SilexRemovedException::class);

        // Act
        new $className();
    }

    /**
     * @return array<int, array<int, string>>
     */
    public function serviceProviderStubProvider(): array
    {
        return [
            [TwigServiceProvider::class],
            [FormServiceProvider::class],
            [ValidatorServiceProvider::class],
            [ServiceControllerServiceProvider::class],
            [HttpFragmentServiceProvider::class],
            [SessionServiceProvider::class],
        ];
    }

    /**
     * Holding a provider must stay harmless - `Spryker\Zed\Testify\Bootstrap\ZedBootstrap` builds
     * all six eagerly.
     *
     * @dataProvider serviceProviderStubProvider
     *
     * @param string $className
     *
     * @return void
     */
    public function testServiceProviderStubIsConstructable(string $className): void
    {
        // Act & Assert
        $this->assertInstanceOf(ServiceProviderInterface::class, new $className());
    }

    /**
     * @dataProvider serviceProviderStubProvider
     *
     * @param string $className
     *
     * @return void
     */
    public function testServiceProviderStubRegisterThrows(string $className): void
    {
        // Assert
        $this->expectException(SilexRemovedException::class);

        // Act
        (new $className())->register(new Application());
    }

    /**
     * @dataProvider serviceProviderStubProvider
     *
     * @param string $className
     *
     * @return void
     */
    public function testServiceProviderStubBootThrows(string $className): void
    {
        // Assert
        $this->expectException(SilexRemovedException::class);

        // Act
        (new $className())->boot(new Application());
    }

    /**
     * The original classes took constructor arguments and existing call sites still pass them
     * (`new RedirectableUrlMatcher($routes, $context)` in
     * `\Spryker\Shared\Application\Business\Routing\SilexRouter`). Those calls must still reach
     * the throw rather than fail differently.
     *
     * @dataProvider nonConstructableStubProvider
     *
     * @param string $className
     *
     * @return void
     */
    public function testConstructingABehaviouralStubWithOriginalArgumentsStillThrows(string $className): void
    {
        // Assert
        $this->expectException(SilexRemovedException::class);

        // Act
        new $className('first', 'second', 'third');
    }

    /**
     * The marker is how tests detect stub mode; `class_exists()` no longer distinguishes.
     *
     * @return void
     */
    public function testStubsAreDetectableViaTheMarkerInterface(): void
    {
        // Act & Assert
        $this->assertTrue(is_a(Application::class, SprykerStubInterface::class, true));
        $this->assertTrue(is_a(TwigServiceProvider::class, SprykerStubInterface::class, true));
        $this->assertTrue(is_a(Controller::class, SprykerStubInterface::class, true));
    }

    /**
     * The marker must NOT leak onto the interfaces: the 23 core classes implementing
     * `ServiceProviderInterface` are real Spryker plugins, not stubs.
     *
     * @return void
     */
    public function testMarkerDoesNotLeakOntoTheInterfaces(): void
    {
        // Act & Assert
        $this->assertFalse(is_a(ServiceProviderInterface::class, SprykerStubInterface::class, true));
        $this->assertFalse(is_a(ControllerProviderInterface::class, SprykerStubInterface::class, true));
    }

    /**
     * `*FragmentControllerResolver` overrides `createController(string): callable`, which is
     * declared on the Symfony resolver. Losing the parent would silently break that override.
     *
     * @return void
     */
    public function testControllerResolverKeepsTheSymfonyParent(): void
    {
        // Act & Assert
        $this->assertTrue(
            is_subclass_of(ControllerResolver::class, 'Symfony\Component\HttpKernel\Controller\ControllerResolver'),
        );
    }

    public function testRedirectableUrlMatcherKeepsTheSymfonyParent(): void
    {
        // Act & Assert
        $this->assertTrue(
            is_subclass_of(RedirectableUrlMatcher::class, 'Symfony\Component\Routing\Matcher\RedirectableUrlMatcher'),
        );
    }
}
