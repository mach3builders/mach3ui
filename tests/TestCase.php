<?php

namespace Mach3Builders\Ui\Tests;

use BladeUI\Icons\BladeIconsServiceProvider;
use Mach3Builders\Ui\Facades\Ui;
use Mach3Builders\Ui\UiServiceProvider;
use MallardDuck\LucideIcons\BladeLucideIconsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
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
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
    }
}
