<?php

namespace Mach3Builders\Ui\Tests;

use Illuminate\Support\Facades\Session;
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

    protected function withOldInput(array $input): static
    {
        Session::put('_old_input', $input);

        return $this;
    }
}
