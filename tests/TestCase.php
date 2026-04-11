<?php

namespace Mach3Builders\Ui\Tests;

use Flux\FluxServiceProvider;
use FluxPro\FluxProServiceProvider;
use Livewire\LivewireServiceProvider;
use Mach3Builders\Ui\UiServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LivewireServiceProvider::class,
            FluxServiceProvider::class,
            FluxProServiceProvider::class,
            UiServiceProvider::class,
        ];
    }
}
