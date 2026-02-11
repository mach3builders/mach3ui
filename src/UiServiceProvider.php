<?php

namespace Mach3Builders\Ui;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\ComponentAttributeBag;
use Livewire\Component;
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
            $title = $title ?: __('ui::ui.toast.'.$variant);

            $this->dispatch('notify', title: $title, message: $message, variant: $variant); /** @phpstan-ignore class.notFound */
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
                    if (class_exists(\Livewire\WireDirective::class)) {
                        return new \Livewire\WireDirective($name, $key, $value);
                    }

                    $modifiers = str_contains($key, '.') ? explode('.', substr($key, strlen($prefix) + 1)) : [];

                    return new class($key, $value, $modifiers)
                    {
                        public function __construct(
                            public string $directive,
                            public mixed $value,
                            public array $modifiers,
                        ) {}

                        public function value(): mixed
                        {
                            return $this->value;
                        }

                        public function hasModifier(string $mod): bool
                        {
                            return in_array($mod, $this->modifiers);
                        }
                    };
                }
            }

            return null;
        });
    }
}
