<?php

namespace Mach3Builders\Ui;

use Illuminate\Support\Facades\Blade;
use Mach3Builders\Ui\Commands\UiCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('ui')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_ui_table')
            ->hasCommand(UiCommand::class);
    }

    public function packageBooted(): void
    {
        $this->bootComponentPath();
        $this->bootTagCompiler();
    }

    protected function bootComponentPath(): void
    {
        Blade::anonymousComponentNamespace(
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
}
