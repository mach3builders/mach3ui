<?php

namespace Mach3Builders\Ui\Tests;

use BladeUI\Icons\BladeIconsServiceProvider;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Mach3Builders\Ui\Facades\Ui;
use Mach3Builders\Ui\UiServiceProvider;
use MallardDuck\LucideIcons\BladeLucideIconsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        // Share empty error bag with all views (mimics Laravel's ShareErrorsFromSession middleware)
        $this->app['view']->share('errors', new ViewErrorBag);
    }

    protected function getPackageProviders($app): array
    {
        return [
            BladeIconsServiceProvider::class,
            BladeLucideIconsServiceProvider::class,
            UiServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'Ui' => Ui::class,
            'UI' => Ui::class, // Some components use uppercase UI
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
    }

    /**
     * Set validation errors for testing error states.
     */
    protected function withErrors(array $errors): self
    {
        $errorBag = new ViewErrorBag;
        $errorBag->put('default', new MessageBag($errors));
        $this->app['view']->share('errors', $errorBag);

        return $this;
    }
}
