<?php

namespace Mach3Builders\Ui;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\ComponentAttributeBag;
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
            ->hasTranslations()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        $this->bootComponentPath();
        $this->bootTagCompiler();
        $this->bootAttributeMacros();
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

    protected function bootAttributeMacros(): void
    {
        // Pluck a sub-prop value from attributes (e.g., 'icon:leading')
        ComponentAttributeBag::macro('pluck', function (string $key, mixed $default = null): mixed {
            /** @var ComponentAttributeBag $this */
            $value = $this->get($key, $default);

            // Remove the attribute after plucking
            unset($this[$key]);

            return $value;
        });

        // Get wire:model information as an object
        ComponentAttributeBag::macro('wire', function (string $name): ?object {
            /** @var ComponentAttributeBag $this */
            $prefix = "wire:{$name}";
            $attributes = $this->getAttributes();

            foreach ($attributes as $key => $value) {
                if (str_starts_with($key, $prefix)) {
                    $modifiers = str_contains($key, '.') ? explode('.', substr($key, strlen($prefix) + 1)) : [];

                    return (object) [
                        'directive' => $key,
                        'value' => $value,
                        'modifiers' => $modifiers,
                        'hasModifier' => fn (string $mod) => in_array($mod, $modifiers),
                    ];
                }
            }

            return null;
        });
    }
}
