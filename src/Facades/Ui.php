<?php

namespace Mach3Builders\Ui\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mach3Builders\Ui\Ui
 */
class Ui extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Mach3Builders\Ui\Ui::class;
    }
}
