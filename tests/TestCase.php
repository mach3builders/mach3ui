<?php

namespace Mach3Builders\Ui\Tests;

use Mach3Builders\Ui\UiServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            \Livewire\LivewireServiceProvider::class,
            \Flux\FluxServiceProvider::class,
            \FluxPro\FluxProServiceProvider::class,
            UiServiceProvider::class,
        ];
    }

}
