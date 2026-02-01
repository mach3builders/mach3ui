<?php

namespace Mach3Builders\Ui;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\ComponentAttributeBag;
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
            ->hasTranslations()
            ->hasViews()
            ->hasMigration('create_ui_table')
            ->hasCommand(UiCommand::class);
    }

    public function packageBooted(): void
    {
        $this->bootComponentPath();
        $this->bootTagCompiler();
        $this->bootAttributeMacros();
        $this->bootBladeDirectives();
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

    protected function bootBladeDirectives(): void
    {
        Blade::directive('uiStyles', function () {
            return <<<'HTML'
<link rel="preconnect" href="https://fonts.bunny.net" />
<link rel="stylesheet" href="https://fonts.bunny.net/css?family=inter:400,500,600,700|saira-semi-condensed:700&display=swap" />
<style>[x-cloak] {display: none}</style>
HTML;
        });

        Blade::directive('uiScripts', function () {
            return <<<'HTML'
<script>
(function() {
    function applyTheme() {
        var t = localStorage.getItem('mach3ui-theme');
        var d = t === 'dark' || (!t && matchMedia('(prefers-color-scheme:dark)').matches);
        document.documentElement.classList.toggle('dark', d);
    }
    applyTheme();
    document.addEventListener('livewire:navigate', applyTheme);
    document.addEventListener('livewire:navigated', applyTheme);
})();
</script>
HTML;
        });
    }
}
