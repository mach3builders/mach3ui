<?php

namespace Mach3Builders\Ui;

use Illuminate\View\ComponentAttributeBag;
use Stringable;

class ClassBuilder implements Stringable
{
    protected array $classes = [];

    protected array $userClasses = [];

    protected static array $cache = [];

    protected const HIERARCHIES = [
        'p' => ['px', 'py', 'pt', 'pr', 'pb', 'pl', 'ps', 'pe'],
        'px' => ['pl', 'pr', 'ps', 'pe'], 'py' => ['pt', 'pb'],
        'm' => ['mx', 'my', 'mt', 'mr', 'mb', 'ml', 'ms', 'me'],
        'mx' => ['ml', 'mr', 'ms', 'me'], 'my' => ['mt', 'mb'],
        'inset' => ['inset-x', 'inset-y', 'top', 'right', 'bottom', 'left', 'start', 'end'],
        'inset-x' => ['left', 'right', 'start', 'end'], 'inset-y' => ['top', 'bottom'],
        'gap' => ['gap-x', 'gap-y'], 'overflow' => ['overflow-x', 'overflow-y'],
        'overscroll' => ['overscroll-x', 'overscroll-y'], 'size' => ['w', 'h'],
        'rounded' => ['rounded-t', 'rounded-r', 'rounded-b', 'rounded-l', 'rounded-tl', 'rounded-tr', 'rounded-br', 'rounded-bl', 'rounded-s', 'rounded-e', 'rounded-ss', 'rounded-se', 'rounded-es', 'rounded-ee'],
        'rounded-t' => ['rounded-tl', 'rounded-tr'], 'rounded-r' => ['rounded-tr', 'rounded-br'],
        'rounded-b' => ['rounded-bl', 'rounded-br'], 'rounded-l' => ['rounded-tl', 'rounded-bl'],
    ];

    public static function make(): static
    {
        return new static;
    }

    public function add(string|array $key, ?array $options = null): static
    {
        $value = $options[$key] ?? ($options === null ? $key : '');

        if (is_array($value)) {
            foreach ($value as $class) {
                $this->classes[] = $class;
            }
        } else {
            $this->classes[] = $value;
        }

        return $this;
    }

    public function when(mixed $condition, string $classes): static
    {
        if ($condition) {
            $this->classes[] = $classes;
        }

        return $this;
    }

    public function unless(mixed $condition, string $classes): static
    {
        if (! $condition) {
            $this->classes[] = $classes;
        }

        return $this;
    }

    public function merge(ComponentAttributeBag $attributes): static
    {
        if ($class = $attributes->get('class', '')) {
            $this->userClasses = preg_split('/\s+/', $class, -1, PREG_SPLIT_NO_EMPTY);
        }

        return $this;
    }

    public function __toString(): string
    {
        $base = [];
        foreach ($this->classes as $str) {
            if ($str !== '') {
                array_push($base, ...preg_split('/\s+/', $str, -1, PREG_SPLIT_NO_EMPTY));
            }
        }
        if (! $this->userClasses) {
            return implode(' ', $base);
        }

        $keys = [];
        foreach ($this->userClasses as $class) {
            [$mod, $pre] = $this->parse($class);
            if ($pre === null) {
                continue;
            }
            $keys[$mod.$pre] = 1;
            foreach (self::HIERARCHIES[$pre] ?? [] as $child) {
                $keys[$mod.$child] = 1;
            }
        }

        $filtered = array_filter($base, fn ($c) => ! isset($keys[$this->parse($c)[0].$this->parse($c)[1]]));

        return implode(' ', [...$filtered, ...$this->userClasses]);
    }

    protected function parse(string $class): array
    {
        if (isset(self::$cache[$class])) {
            return self::$cache[$class];
        }

        $parts = explode(':', $class);
        $util = ltrim(array_pop($parts), '!-');
        sort($parts);
        $mod = $parts ? implode(':', $parts).':' : '';

        if ($util === '') {
            return self::$cache[$class] = [$mod, null];
        }

        static $multi = ['rounded-tl', 'rounded-tr', 'rounded-bl', 'rounded-br', 'rounded-ss', 'rounded-se', 'rounded-es', 'rounded-ee', 'rounded-t', 'rounded-r', 'rounded-b', 'rounded-l', 'rounded-s', 'rounded-e', 'border-t', 'border-r', 'border-b', 'border-l', 'border-s', 'border-e', 'scroll-mt', 'scroll-mr', 'scroll-mb', 'scroll-ml', 'scroll-ms', 'scroll-me', 'scroll-pt', 'scroll-pr', 'scroll-pb', 'scroll-pl', 'scroll-ps', 'scroll-pe', 'divide-x', 'divide-y', 'space-x', 'space-y', 'inset-x', 'inset-y', 'gap-x', 'gap-y', 'overflow-x', 'overflow-y', 'overscroll-x', 'overscroll-y', 'grid-cols', 'grid-rows', 'col-span', 'row-span', 'flex-col', 'flex-row', 'line-clamp', 'min-w', 'max-w', 'min-h', 'max-h', 'scroll-m', 'scroll-p'];

        foreach ($multi as $p) {
            if ($util === $p || str_starts_with($util, $p.'-')) {
                return self::$cache[$class] = [$mod, $p];
            }
        }

        if (str_starts_with($util, 'text-')) {
            $v = substr($util, 5);
            $pre = match (true) {
                in_array($v, ['xs', 'sm', 'base', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl', '8xl', '9xl']) => 'text-size',
                in_array($v, ['left', 'center', 'right', 'justify', 'start', 'end']) => 'text-align',
                default => 'text-color'
            };

            return self::$cache[$class] = [$mod, $pre];
        }

        if (str_starts_with($util, 'font-')) {
            $pre = in_array(substr($util, 5), ['sans', 'serif', 'mono']) ? 'font-family' : 'font-weight';

            return self::$cache[$class] = [$mod, $pre];
        }

        $first = explode('-', $util, 2)[0];
        static $colors = ['bg', 'border', 'ring', 'shadow', 'outline', 'fill', 'stroke', 'accent', 'caret', 'decoration', 'from', 'via', 'to', 'divide', 'placeholder'];

        return self::$cache[$class] = [$mod, in_array($first, $colors) ? $first : $first];
    }
}
