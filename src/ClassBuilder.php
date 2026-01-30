<?php

namespace Mach3Builders\Ui;

use Illuminate\Support\Arr;
use Stringable;

class ClassBuilder implements Stringable
{
    /** @var array<int, string> */
    protected array $pending = [];

    /**
     * Add classes to the builder.
     *
     * @param  string|array<int|string, mixed>  $classes
     */
    public function add(string|array $classes): static
    {
        $this->pending[] = Arr::toCssClasses(Arr::wrap($classes));

        return $this;
    }

    /**
     * Conditionally add classes.
     *
     * @param  string|array<int|string, mixed>  $classes
     */
    public function when(mixed $condition, string|array $classes): static
    {
        if ($condition) {
            $this->add($classes);
        }

        return $this;
    }

    /**
     * Conditionally add classes when condition is false.
     *
     * @param  string|array<int|string, mixed>  $classes
     */
    public function unless(mixed $condition, string|array $classes): static
    {
        return $this->when(! $condition, $classes);
    }

    public function __toString(): string
    {
        return collect($this->pending)->filter()->join(' ');
    }
}
