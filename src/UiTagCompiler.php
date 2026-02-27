<?php

namespace Mach3Builders\Ui;

use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Compilers\ComponentTagCompiler;

class UiTagCompiler extends ComponentTagCompiler
{
    public function __construct(
        array $aliases = [],
        array $namespaces = [],
        ?BladeCompiler $blade = null
    ) {
        parent::__construct($aliases, $namespaces, $blade);
    }

    public function compile(string $value): string
    {
        // Transform <ui:component> to <x-ui::component> before parent compilation
        $value = $this->transformUiTags($value);

        // Now compile the transformed x-ui:: tags using parent's component compilation
        return parent::compile($value);
    }

    protected function transformUiTags(string $value): string
    {
        // Attribute pattern that correctly handles > inside quoted values
        // e.g. wire:key="workspace-{{ $workspace->getKey() }}"
        $attrs = '(?:\s(?:[^>"\']|"[^"]*"|\'[^\']*\')*)';

        // Self-closing tags: <ui:icon />
        $value = preg_replace(
            '/<ui:([a-zA-Z0-9\-_.]+)('.$attrs.'?)\s*\/>/s',
            '<x-ui::$1$2 />',
            $value
        );

        // Opening tags: <ui:button type="primary">
        $value = preg_replace(
            '/<ui:([a-zA-Z0-9\-_.]+)('.$attrs.'?)>/s',
            '<x-ui::$1$2>',
            $value
        );

        // Closing tags: </ui:button>
        $value = preg_replace(
            '/<\/ui:([a-zA-Z0-9\-_.]+)>/s',
            '</x-ui::$1>',
            $value
        );

        return $value;
    }
}
