<?php

namespace Mach3Builders\Ui;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('ui')
            ->hasViews('ui');
    }

    public function packageBooted(): void
    {
        $this->bootComponentPath();
        $this->bootTagCompiler();
        $this->bootLivewireMacros();
    }

    protected function bootComponentPath(): void
    {
        Blade::anonymousComponentPath(
            realpath($this->package->basePath('/../resources/views/components')),
            'ui'
        );
    }

    protected function bootTagCompiler(): void
    {
        $compiler = new UiTagCompiler(
            app('blade.compiler')->getClassComponentAliases(),
            app('blade.compiler')->getClassComponentNamespaces(),
            app('blade.compiler')
        );

        app('blade.compiler')->precompiler(function ($value) use ($compiler) {
            return $compiler->compile($value);
        });
    }

    protected function bootLivewireMacros(): void
    {
        if (! class_exists(Component::class)) {
            return;
        }

        Component::macro('notify', function (string $message, ?string $title = null, string $variant = 'success'): void {
            /** @var Component $this */
            \Flux::toast(
                text: $message,
                heading: $title,
                variant: $variant,
            );
        });
    }
}
