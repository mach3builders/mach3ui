<?php

namespace Mach3Builders\Ui;

use Illuminate\Support\Arr;
use Illuminate\View\ComponentAttributeBag;
use Stringable;

class ClassBuilder implements Stringable
{
    /** @var array<int, string> */
    protected array $pending = [];

    protected ?string $userClasses = null;

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

    /**
     * Merge user classes with intelligent conflict resolution.
     */
    public function merge(ComponentAttributeBag|string $attributes): static
    {
        $this->userClasses = match (true) {
            $attributes instanceof ComponentAttributeBag => $attributes->get('class', ''),
            default => $attributes,
        };

        return $this;
    }

    public function __toString(): string
    {
        $componentClasses = collect($this->pending)->filter()->join(' ');

        if ($this->userClasses) {
            return ClassMerger::merge($componentClasses, $this->userClasses);
        }

        return $componentClasses;
    }
}
