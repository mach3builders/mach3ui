<?php

namespace Mach3Builders\Ui;

use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;

class Ui
{
    /**
     * Static counter for generating unique IDs per request.
     */
    protected static int $idCounter = 0;

    /**
     * Generate a unique ID with the given prefix.
     * Uses a static counter to ensure uniqueness while remaining deterministic.
     */
    public function uniqueId(string $prefix = 'ui'): string
    {
        return $prefix.'-'.++static::$idCounter;
    }

    /**
     * Create a new class builder instance.
     *
     * @param  string|array<int|string, mixed>|null  $classes
     */
    public function classes(string|array|null $classes = null): ClassBuilder
    {
        $builder = new ClassBuilder;

        return $classes ? $builder->add($classes) : $builder;
    }

    /**
     * Extract forwarded attributes (props passed via attributes).
     *
     * @param  array<int, string>  $propKeys
     * @return array<string, mixed>
     */
    public function forwardedAttributes(ComponentAttributeBag $attributes, array $propKeys): array
    {
        $props = [];

        $unescape = fn ($value) => is_string($value)
            ? htmlspecialchars_decode($value, ENT_QUOTES)
            : $value;

        foreach ($propKeys as $key) {
            if (isset($attributes[$key])) {
                $props[$key] = $unescape($attributes[$key]);
            } elseif (isset($attributes[Str::kebab($key)])) {
                $props[$key] = $unescape($attributes[Str::kebab($key)]);
            }
        }

        return $props;
    }

    /**
     * Extract attributes with a specific prefix.
     *
     * @param  array<string, mixed>  $default
     */
    public function attributesAfter(string $prefix, ComponentAttributeBag $attributes, array $default = []): ComponentAttributeBag
    {
        $newAttributes = new ComponentAttributeBag($default);

        foreach ($attributes->getAttributes() as $key => $value) {
            if (str_starts_with($key, $prefix)) {
                $newAttributes[substr($key, strlen($prefix))] = $value;
            }
        }

        return $newAttributes;
    }

    /**
     * Split attributes into two bags based on keys.
     *
     * @param  array<int, string>  $by
     * @return array{0: ComponentAttributeBag, 1: ComponentAttributeBag}
     */
    public function splitAttributes(ComponentAttributeBag $attributes, array $by = ['class', 'style']): array
    {
        return [
            $attributes->only($by),
            $attributes->except($by),
        ];
    }

    /**
     * Apply inset margins based on position.
     */
    public function applyInset(
        bool|string|null $inset,
        string $top,
        string $right,
        string $bottom,
        string $left
    ): string {
        if ($inset === null || $inset === false) {
            return '';
        }

        $positions = $inset === true
            ? collect(['top', 'right', 'bottom', 'left'])
            : str($inset)->explode(' ')->map(fn ($i) => trim($i));

        $insetClasses = [
            'top' => $top,
            'right' => $right,
            'bottom' => $bottom,
            'left' => $left,
        ];

        return $positions->map(fn ($i) => $insetClasses[$i] ?? '')->filter()->join(' ');
    }
}
