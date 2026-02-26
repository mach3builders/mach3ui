<?php

namespace Mach3Builders\Ui\Tests;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Mach3Builders\Ui\UiServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->share('errors', new ViewErrorBag);
    }

    protected function getPackageProviders($app): array
    {
        return [
            \Livewire\LivewireServiceProvider::class,
            \Flux\FluxServiceProvider::class,
            UiServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
    }

    protected function withErrors(array $errors): self
    {
        $errorBag = new ViewErrorBag;
        $errorBag->put('default', new MessageBag($errors));
        $this->app['view']->share('errors', $errorBag);

        return $this;
    }
}
