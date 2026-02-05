<?php

use Illuminate\Support\Facades\Blade;

function bench(string $blade, int $iterations = 50): array
{
    // Warmup
    Blade::render($blade);

    $times = [];
    for ($i = 0; $i < $iterations; $i++) {
        $start = hrtime(true);
        Blade::render($blade);
        $times[] = (hrtime(true) - $start) / 1_000_000;
    }

    return [
        'avg' => array_sum($times) / count($times),
        'min' => min($times),
        'max' => max($times),
    ];
}

test('benchmark button variants (large inline maps)', function () {
    $iterations = 50;

    $variants = [
        'default' => '<ui:button>Click</ui:button>',
        'primary' => '<ui:button variant="primary">Click</ui:button>',
        'secondary' => '<ui:button variant="secondary">Click</ui:button>',
        'ghost' => '<ui:button variant="ghost">Click</ui:button>',
        'danger' => '<ui:button variant="danger">Click</ui:button>',
    ];

    dump("\n=== Button Variants Benchmark ({$iterations} iterations) ===\n");

    $results = [];
    foreach ($variants as $name => $blade) {
        $result = bench($blade, $iterations);
        $results[$name] = $result;
        dump(sprintf('%-15s avg: %.3fms | min: %.3fms | max: %.3fms', $name, $result['avg'], $result['min'], $result['max']));
    }

    // Test scaling
    dump("\n=== Button Scaling ===");
    $scales = [1, 5, 10, 20];
    foreach ($scales as $count) {
        $blade = str_repeat('<ui:button variant="primary">Click</ui:button>', $count);
        $result = bench($blade, 20);
        dump(sprintf('%d buttons: %.2fms total | %.3fms per button', $count, $result['avg'], $result['avg'] / $count));
    }

    expect(true)->toBeTrue();
});

test('benchmark form inputs (wire:model detection)', function () {
    $iterations = 50;

    $inputs = [
        'basic' => '<ui:input name="test" />',
        'with label' => '<ui:input name="test" label="Test" />',
        'with hint' => '<ui:input name="test" label="Test" hint="Help" />',
        'with wire:model' => '<ui:input name="test" wire:model="form.test" />',
        'full form field' => '<ui:input name="test" label="Test" hint="Help" wire:model.live="form.test" />',
    ];

    dump("\n=== Input Component Benchmark ({$iterations} iterations) ===\n");

    foreach ($inputs as $name => $blade) {
        $result = bench($blade, $iterations);
        dump(sprintf('%-20s avg: %.3fms | min: %.3fms | max: %.3fms', $name, $result['avg'], $result['min'], $result['max']));
    }

    // Simulate a form with multiple inputs
    dump("\n=== Form Simulation ===");
    $formSizes = [3, 5, 10];
    foreach ($formSizes as $count) {
        $blade = '';
        for ($i = 0; $i < $count; $i++) {
            $blade .= "<ui:input name=\"field{$i}\" label=\"Field {$i}\" wire:model=\"form.field{$i}\" />";
        }
        $result = bench($blade, 20);
        dump(sprintf('%d inputs: %.2fms total | %.3fms per input', $count, $result['avg'], $result['avg'] / $count));
    }

    expect(true)->toBeTrue();
});

test('benchmark badge and alert (medium complexity)', function () {
    $iterations = 50;

    $components = [
        'badge' => '<ui:badge>Tag</ui:badge>',
        'badge variant' => '<ui:badge variant="success">Tag</ui:badge>',
        'badge with icon' => '<ui:badge icon="check">Tag</ui:badge>',
        'alert' => '<ui:alert>Message</ui:alert>',
        'alert variant' => '<ui:alert variant="success">Message</ui:alert>',
        'alert with icon' => '<ui:alert icon="check">Message</ui:alert>',
    ];

    dump("\n=== Badge/Alert Benchmark ({$iterations} iterations) ===\n");

    foreach ($components as $name => $blade) {
        $result = bench($blade, $iterations);
        dump(sprintf('%-20s avg: %.3fms | min: %.3fms | max: %.3fms', $name, $result['avg'], $result['min'], $result['max']));
    }

    expect(true)->toBeTrue();
});

test('benchmark realistic page scenarios', function () {
    $iterations = 10;

    // Typical dashboard card
    $dashboardCard = <<<'BLADE'
        <ui:card>
            <ui:card.header>
                <ui:heading level="3">Statistics</ui:heading>
            </ui:card.header>
            <ui:card.body>
                <ui:text variant="muted">Some description</ui:text>
                <div class="flex gap-2 mt-4">
                    <ui:badge variant="success">Active</ui:badge>
                    <ui:badge variant="warning">Pending</ui:badge>
                </div>
            </ui:card.body>
            <ui:card.footer>
                <ui:button variant="ghost" size="sm">View all</ui:button>
            </ui:card.footer>
        </ui:card>
    BLADE;

    // Simple form
    $simpleForm = <<<'BLADE'
        <ui:card>
            <ui:card.body class="space-y-4">
                <ui:input name="name" label="Name" />
                <ui:input name="email" label="Email" type="email" />
                <ui:textarea name="message" label="Message" />
            </ui:card.body>
            <ui:card.footer>
                <ui:button>Submit</ui:button>
            </ui:card.footer>
        </ui:card>
    BLADE;

    // Navigation with icons
    $navWithIcons = <<<'BLADE'
        <nav class="space-y-1">
            <ui:button variant="ghost" class="w-full justify-start"><ui:icon name="home" /> Dashboard</ui:button>
            <ui:button variant="ghost" class="w-full justify-start"><ui:icon name="users" /> Users</ui:button>
            <ui:button variant="ghost" class="w-full justify-start"><ui:icon name="settings" /> Settings</ui:button>
            <ui:button variant="ghost" class="w-full justify-start"><ui:icon name="log-out" /> Logout</ui:button>
        </nav>
    BLADE;

    $scenarios = [
        'Dashboard card (~10 components)' => $dashboardCard,
        'Simple form (~6 components)' => $simpleForm,
        'Nav with icons (~8 components)' => $navWithIcons,
    ];

    dump("\n=== Realistic Page Scenarios ({$iterations} iterations) ===\n");

    foreach ($scenarios as $name => $blade) {
        $result = bench($blade, $iterations);
        dump(sprintf('%-35s avg: %6.2fms | min: %6.2fms | max: %6.2fms', $name, $result['avg'], $result['min'], $result['max']));
    }

    // Full page simulation
    dump("\n=== Full Page Simulation ===");
    $fullPage = $dashboardCard.$dashboardCard.$dashboardCard.$simpleForm.$navWithIcons;
    $result = bench($fullPage, 5);
    dump(sprintf('Full page (~40 components): %.2fms', $result['avg']));

    expect(true)->toBeTrue();
});

test('measure overhead sources', function () {
    $iterations = 100;

    // Pure PHP baseline - array creation
    $start = hrtime(true);
    for ($i = 0; $i < $iterations; $i++) {
        $colors = [
            'inherit' => 'text-inherit',
            'gray' => 'text-gray-500 dark:text-gray-400',
            'blue' => 'text-blue-600 dark:text-blue-500',
            'green' => 'text-green-600 dark:text-green-500',
            'amber' => 'text-amber-600 dark:text-amber-500',
            'red' => 'text-red-600 dark:text-red-500',
            'yellow' => 'text-yellow-600 dark:text-yellow-500',
            'purple' => 'text-purple-600 dark:text-purple-500',
            'rose' => 'text-rose-600 dark:text-rose-500',
            'indigo' => 'text-indigo-600 dark:text-indigo-500',
            'cyan' => 'text-cyan-600 dark:text-cyan-500',
            'teal' => 'text-teal-600 dark:text-teal-500',
        ];
        $result = $colors['blue'] ?? '';
    }
    $arrayCreation = (hrtime(true) - $start) / 1_000_000;

    // Class constant access (simulated cache)
    $cachedColors = [
        'inherit' => 'text-inherit',
        'gray' => 'text-gray-500 dark:text-gray-400',
        'blue' => 'text-blue-600 dark:text-blue-500',
    ];
    $start = hrtime(true);
    for ($i = 0; $i < $iterations; $i++) {
        $result = $cachedColors['blue'] ?? '';
    }
    $constantAccess = (hrtime(true) - $start) / 1_000_000;

    // ClassBuilder creation
    $start = hrtime(true);
    for ($i = 0; $i < $iterations; $i++) {
        \Ui::classes()
            ->add('base classes here')
            ->add('blue', ['blue' => 'text-blue-500', 'red' => 'text-red-500'])
            ->when(true, 'conditional')
            ->__toString();
    }
    $classBuilder = (hrtime(true) - $start) / 1_000_000;

    dump("\n=== Overhead Sources ({$iterations} iterations) ===\n");
    dump(sprintf('Array creation (12 items):  %.4fms per call', $arrayCreation / $iterations));
    dump(sprintf('Constant access:            %.4fms per call', $constantAccess / $iterations));
    dump(sprintf('ClassBuilder full cycle:    %.4fms per call', $classBuilder / $iterations));

    dump("\n=== Relative Cost ===");
    dump(sprintf('Array creation overhead: %.0fx vs constant access', $arrayCreation / $constantAccess));

    expect(true)->toBeTrue();
});
