<?php

use Illuminate\View\ComponentAttributeBag;
use Mach3Builders\Ui\ClassBuilder;

it('can be instantiated via make', function () {
    $builder = ClassBuilder::make();

    expect($builder)->toBeInstanceOf(ClassBuilder::class);
});

it('adds simple classes', function () {
    $classes = ClassBuilder::make()
        ->add('flex items-center')
        ->__toString();

    expect($classes)->toBe('flex items-center');
});

it('adds multiple classes via chaining', function () {
    $classes = ClassBuilder::make()
        ->add('flex')
        ->add('items-center')
        ->add('justify-between')
        ->__toString();

    expect($classes)->toBe('flex items-center justify-between');
});

it('handles null key gracefully', function () {
    $classes = ClassBuilder::make()
        ->add('flex')
        ->add(null)
        ->add('items-center')
        ->__toString();

    expect($classes)->toBe('flex items-center');
});

it('maps variant key to classes', function () {
    $classes = ClassBuilder::make()
        ->add('primary', [
            'primary' => 'bg-blue-500 text-white',
            'secondary' => 'bg-gray-200 text-gray-800',
        ])
        ->__toString();

    expect($classes)->toBe('bg-blue-500 text-white');
});

it('maps size key to classes', function () {
    $classes = ClassBuilder::make()
        ->add('md', [
            'sm' => 'h-8 px-2 text-xs',
            'md' => 'h-10 px-4 text-sm',
            'lg' => 'h-12 px-6 text-base',
        ])
        ->__toString();

    expect($classes)->toBe('h-10 px-4 text-sm');
});

it('returns empty string for unmapped variant', function () {
    $classes = ClassBuilder::make()
        ->add('unknown', [
            'primary' => 'bg-blue-500',
            'secondary' => 'bg-gray-200',
        ])
        ->__toString();

    expect($classes)->toBe('');
});

it('adds classes conditionally with when', function () {
    $classesTrue = ClassBuilder::make()
        ->add('flex')
        ->when(true, 'items-center')
        ->__toString();

    $classesFalse = ClassBuilder::make()
        ->add('flex')
        ->when(false, 'items-center')
        ->__toString();

    expect($classesTrue)->toBe('flex items-center');
    expect($classesFalse)->toBe('flex');
});

it('adds classes conditionally with unless', function () {
    $classesTrue = ClassBuilder::make()
        ->add('flex')
        ->unless(true, 'hidden')
        ->__toString();

    $classesFalse = ClassBuilder::make()
        ->add('flex')
        ->unless(false, 'hidden')
        ->__toString();

    expect($classesTrue)->toBe('flex');
    expect($classesFalse)->toBe('flex hidden');
});

it('merges user classes from attributes', function () {
    $attributes = new ComponentAttributeBag(['class' => 'my-custom-class']);

    $classes = ClassBuilder::make()
        ->add('flex items-center')
        ->merge($attributes)
        ->__toString();

    expect($classes)->toContain('flex')
        ->toContain('items-center')
        ->toContain('my-custom-class');
});

it('user classes override conflicting base classes', function () {
    $attributes = new ComponentAttributeBag(['class' => 'bg-red-500']);

    $classes = ClassBuilder::make()
        ->add('bg-blue-500 text-white')
        ->merge($attributes)
        ->__toString();

    expect($classes)
        ->toContain('text-white')
        ->toContain('bg-red-500')
        ->not->toContain('bg-blue-500');
});

it('handles padding hierarchy overrides', function () {
    // User px should override component pl and pr
    $attributes = new ComponentAttributeBag(['class' => 'px-8']);

    $classes = ClassBuilder::make()
        ->add('pl-2 pr-4 py-2')
        ->merge($attributes)
        ->__toString();

    expect($classes)
        ->toContain('py-2')
        ->toContain('px-8')
        ->not->toContain('pl-2')
        ->not->toContain('pr-4');
});

it('handles rounded hierarchy overrides', function () {
    // User rounded should override component rounded-t
    $attributes = new ComponentAttributeBag(['class' => 'rounded-lg']);

    $classes = ClassBuilder::make()
        ->add('rounded-t-md rounded-b-none')
        ->merge($attributes)
        ->__toString();

    expect($classes)
        ->toContain('rounded-lg')
        ->not->toContain('rounded-t-md')
        ->not->toContain('rounded-b-none');
});

it('preserves non-conflicting user and base classes', function () {
    $attributes = new ComponentAttributeBag(['class' => 'shadow-lg']);

    $classes = ClassBuilder::make()
        ->add('flex items-center bg-white')
        ->merge($attributes)
        ->__toString();

    expect($classes)
        ->toContain('flex')
        ->toContain('items-center')
        ->toContain('bg-white')
        ->toContain('shadow-lg');
});

it('handles text-size vs text-color conflict correctly', function () {
    // User text-lg should override text-sm but not text-gray-900
    $attributes = new ComponentAttributeBag(['class' => 'text-lg']);

    $classes = ClassBuilder::make()
        ->add('text-sm text-gray-900')
        ->merge($attributes)
        ->__toString();

    expect($classes)
        ->toContain('text-gray-900')
        ->toContain('text-lg')
        ->not->toContain('text-sm');
});

it('handles text-color override correctly', function () {
    // User text-red-500 should override text-gray-900 but not text-sm
    $attributes = new ComponentAttributeBag(['class' => 'text-red-500']);

    $classes = ClassBuilder::make()
        ->add('text-sm text-gray-900')
        ->merge($attributes)
        ->__toString();

    expect($classes)
        ->toContain('text-sm')
        ->toContain('text-red-500')
        ->not->toContain('text-gray-900');
});

it('handles responsive modifiers correctly', function () {
    // sm:bg-red should only override sm:bg-blue, not unmodified bg classes
    $attributes = new ComponentAttributeBag(['class' => 'sm:bg-red-500']);

    $classes = ClassBuilder::make()
        ->add('bg-blue-500 sm:bg-blue-700')
        ->merge($attributes)
        ->__toString();

    expect($classes)
        ->toContain('bg-blue-500')
        ->toContain('sm:bg-red-500')
        ->not->toContain('sm:bg-blue-700');
});

it('handles hover state modifiers correctly', function () {
    $attributes = new ComponentAttributeBag(['class' => 'hover:bg-blue-700']);

    $classes = ClassBuilder::make()
        ->add('bg-blue-500 hover:bg-blue-600')
        ->merge($attributes)
        ->__toString();

    expect($classes)
        ->toContain('bg-blue-500')
        ->toContain('hover:bg-blue-700')
        ->not->toContain('hover:bg-blue-600');
});

it('handles combined modifiers', function () {
    // sm:hover:bg-red should override sm:hover:bg-blue but not hover:bg or sm:bg
    $attributes = new ComponentAttributeBag(['class' => 'sm:hover:bg-red-500']);

    $classes = ClassBuilder::make()
        ->add('hover:bg-blue-500 sm:bg-blue-300 sm:hover:bg-blue-600')
        ->merge($attributes)
        ->__toString();

    expect($classes)
        ->toContain('hover:bg-blue-500')
        ->toContain('sm:bg-blue-300')
        ->toContain('sm:hover:bg-red-500')
        ->not->toContain('sm:hover:bg-blue-600');
});

it('handles font-weight vs font-family correctly', function () {
    $weightAttributes = new ComponentAttributeBag(['class' => 'font-bold']);
    $familyAttributes = new ComponentAttributeBag(['class' => 'font-mono']);

    $weightClasses = ClassBuilder::make()
        ->add('font-medium font-sans')
        ->merge($weightAttributes)
        ->__toString();

    $familyClasses = ClassBuilder::make()
        ->add('font-medium font-sans')
        ->merge($familyAttributes)
        ->__toString();

    // font-bold should override font-medium but not font-sans
    expect($weightClasses)
        ->toContain('font-sans')
        ->toContain('font-bold')
        ->not->toContain('font-medium');

    // font-mono should override font-sans but not font-medium
    expect($familyClasses)
        ->toContain('font-medium')
        ->toContain('font-mono')
        ->not->toContain('font-sans');
});

it('handles text-transform utilities', function () {
    $attributes = new ComponentAttributeBag(['class' => 'lowercase']);

    $classes = ClassBuilder::make()
        ->add('uppercase font-bold')
        ->merge($attributes)
        ->__toString();

    expect($classes)
        ->toContain('font-bold')
        ->toContain('lowercase')
        ->not->toContain('uppercase');
});

it('handles empty class attribute', function () {
    $attributes = new ComponentAttributeBag(['class' => '']);

    $classes = ClassBuilder::make()
        ->add('flex items-center')
        ->merge($attributes)
        ->__toString();

    expect($classes)->toBe('flex items-center');
});

it('handles attributes without class', function () {
    $attributes = new ComponentAttributeBag(['id' => 'my-id']);

    $classes = ClassBuilder::make()
        ->add('flex items-center')
        ->merge($attributes)
        ->__toString();

    expect($classes)->toBe('flex items-center');
});

it('is fluent and chainable', function () {
    $attributes = new ComponentAttributeBag(['class' => 'custom']);

    $builder = ClassBuilder::make()
        ->add('base')
        ->add('md', ['sm' => 'small', 'md' => 'medium'])
        ->when(true, 'conditional')
        ->unless(false, 'unless-conditional')
        ->merge($attributes);

    expect($builder)->toBeInstanceOf(ClassBuilder::class);

    $classes = $builder->__toString();
    expect($classes)
        ->toContain('base')
        ->toContain('medium')
        ->toContain('conditional')
        ->toContain('unless-conditional')
        ->toContain('custom');
});

it('casts to string automatically via Stringable', function () {
    $builder = ClassBuilder::make()->add('flex items-center');

    // Using string interpolation triggers __toString
    $result = "{$builder}";

    expect($result)->toBe('flex items-center');
});

it('handles size utility override', function () {
    // size-X is shorthand for w-X h-X, should override both
    $attributes = new ComponentAttributeBag(['class' => 'size-8']);

    $classes = ClassBuilder::make()
        ->add('w-4 h-4')
        ->merge($attributes)
        ->__toString();

    expect($classes)
        ->toContain('size-8')
        ->not->toContain('w-4')
        ->not->toContain('h-4');
});
