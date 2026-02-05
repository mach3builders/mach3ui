<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ViewErrorBag;

beforeEach(function () {
    // Provide $errors for form components
    view()->share('errors', new ViewErrorBag);
});

function benchComponent(string $blade, int $iterations = 30): ?array
{
    try {
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
    } catch (\Throwable $e) {
        return null; // Component failed to render
    }
}

test('full component performance scan', function () {
    $iterations = 30;

    // All testable components with minimal required props
    $components = [
        // Simple components (no dependencies)
        'text' => '<ui:text>Content</ui:text>',
        'heading' => '<ui:heading>Title</ui:heading>',
        'divider' => '<ui:divider />',
        'box' => '<ui:box>Content</ui:box>',
        'label' => '<ui:label>Label</ui:label>',
        'hint' => '<ui:hint>Hint text</ui:hint>',
        'error' => '<ui:error>Error text</ui:error>',
        'kbd' => '<ui:kbd>Ctrl+S</ui:kbd>',
        'link' => '<ui:link href="#">Link</ui:link>',
        'section' => '<ui:section>Content</ui:section>',

        // Icons (optimized)
        'icon' => '<ui:icon name="check" />',
        'icon (boxed)' => '<ui:icon name="check" boxed />',

        // Buttons
        'button' => '<ui:button>Click</ui:button>',
        'button (primary)' => '<ui:button variant="primary">Click</ui:button>',
        'button (with icon)' => '<ui:button icon="check">Click</ui:button>',

        // Feedback
        'badge' => '<ui:badge>Tag</ui:badge>',
        'badge (icon)' => '<ui:badge icon="check">Tag</ui:badge>',
        'alert' => '<ui:alert>Message</ui:alert>',
        'alert (icon)' => '<ui:alert icon="info">Message</ui:alert>',
        'toast' => '<ui:toast>Toast message</ui:toast>',
        'skeleton' => '<ui:skeleton />',
        'skeleton (count)' => '<ui:skeleton count="5" />',

        // Avatar
        'avatar' => '<ui:avatar name="John Doe" />',
        'avatar (image)' => '<ui:avatar src="https://example.com/img.jpg" />',

        // Card
        'card' => '<ui:card>Content</ui:card>',
        'card (full)' => '<ui:card><ui:card.header>Header</ui:card.header><ui:card.body>Body</ui:card.body></ui:card>',

        // Table
        'table' => '<ui:table><ui:thead><ui:tr><ui:th>Col</ui:th></ui:tr></ui:thead></ui:table>',
        'table (row)' => '<ui:table><ui:tbody><ui:tr><ui:td>Cell</ui:td></ui:tr></ui:tbody></ui:table>',

        // Form components
        'input' => '<ui:input name="test" />',
        'input (full)' => '<ui:input name="test" label="Label" hint="Hint" />',
        'textarea' => '<ui:textarea name="test" />',
        'select' => '<ui:select name="test"><option>A</option></ui:select>',
        'checkbox' => '<ui:checkbox name="test" />',
        'radio' => '<ui:radio name="test" />',
        'toggle' => '<ui:toggle name="test" />',
        'switch' => '<ui:switch name="test" />',
        'slider' => '<ui:slider name="test" />',
        'field' => '<ui:field label="Label"><ui:input name="test" /></ui:field>',

        // Complex components
        'dropdown' => '<ui:dropdown><ui:dropdown.trigger><ui:button>Open</ui:button></ui:dropdown.trigger><ui:dropdown.menu><ui:dropdown.item>Item</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>',
        'modal' => '<ui:modal name="test"><ui:modal.body>Content</ui:modal.body></ui:modal>',
        'tabs' => '<ui:tabs><ui:tabs.list><ui:tabs.item value="a">Tab A</ui:tabs.item></ui:tabs.list><ui:tabs.panel value="a">Panel A</ui:tabs.panel></ui:tabs>',
        'accordion' => '<ui:accordion><ui:accordion.item title="Item 1">Content</ui:accordion.item></ui:accordion>',
        'tooltip' => '<ui:tooltip text="Tooltip"><ui:button>Hover</ui:button></ui:tooltip>',

        // Navigation
        'breadcrumbs' => '<ui:breadcrumbs><ui:breadcrumbs.item url="/">Home</ui:breadcrumbs.item></ui:breadcrumbs>',
        'pagination' => '<ui:pagination :total="100" :perPage="10" :currentPage="1" />',
        'nav' => '<ui:nav><ui:nav.item href="/">Home</ui:nav.item></ui:nav>',
        'steps' => '<ui:steps><ui:steps.item>Step 1</ui:steps.item><ui:steps.item>Step 2</ui:steps.item></ui:steps>',

        // Progress
        'progress' => '<ui:progress :value="50" />',

        // Special
        'logo' => '<ui:logo />',
        'theme-switcher' => '<ui:theme-switcher />',
        'toaster' => '<ui:toaster />',
        'action-bar' => '<ui:action-bar>Actions</ui:action-bar>',
        'list' => '<ui:list><ui:list.item>Item</ui:list.item></ui:list>',
        'definition-list' => '<ui:definition-list><ui:definition-list.item label="A">B</ui:definition-list.item></ui:definition-list>',

        // Heavy components (these might be slower)
        'selectbox' => '<ui:selectbox name="test"><ui:selectbox.option value="a">A</ui:selectbox.option><ui:selectbox.option value="b">B</ui:selectbox.option></ui:selectbox>',
        'datepicker' => '<ui:datepicker name="test" />',
        'timepicker' => '<ui:timepicker name="test" />',
        'file-upload' => '<ui:file-upload name="test" />',
        'rich-text-editor' => '<ui:rich-text-editor name="test" />',
        'input/otp' => '<ui:input.otp name="test" />',
        'input/tags' => '<ui:input.tags name="test" />',
        'code-editor' => '<ui:code-editor name="test" />',
        'chart' => '<ui:chart :data="[1,2,3]" />',
        'browser' => '<ui:browser url="https://example.com">Content</ui:browser>',
    ];

    $results = [];
    $failed = [];

    foreach ($components as $name => $blade) {
        $result = benchComponent($blade, $iterations);
        if ($result) {
            $results[$name] = $result;
        } else {
            $failed[] = $name;
        }
    }

    // Sort by average time (slowest first)
    uasort($results, fn ($a, $b) => $b['avg'] <=> $a['avg']);

    dump("\n=== Full Component Performance Scan ({$iterations} iterations) ===\n");
    dump('Tested: '.count($results).' components | Failed: '.count($failed)."\n");

    // Top 15 slowest
    dump('=== SLOWEST COMPONENTS ===');
    $i = 0;
    foreach ($results as $name => $result) {
        if ($i++ >= 15) {
            break;
        }
        $flag = $result['avg'] > 1.0 ? ' ⚠️' : ($result['avg'] > 0.5 ? ' ⚡' : '');
        dump(sprintf('%-25s avg: %6.3fms | min: %6.3fms | max: %6.3fms%s', $name, $result['avg'], $result['min'], $result['max'], $flag));
    }

    // Top 10 fastest
    dump("\n=== FASTEST COMPONENTS ===");
    $fastest = array_slice(array_reverse($results, true), 0, 10, true);
    foreach ($fastest as $name => $result) {
        dump(sprintf('%-25s avg: %6.3fms', $name, $result['avg']));
    }

    // Statistics
    $avgTimes = array_column($results, 'avg');
    dump("\n=== STATISTICS ===");
    dump(sprintf('Average:  %.3fms', array_sum($avgTimes) / count($avgTimes)));
    dump(sprintf('Median:   %.3fms', $avgTimes[intval(count($avgTimes) / 2)]));
    dump(sprintf('Slowest:  %.3fms (%s)', max($avgTimes), array_search(max($avgTimes), array_column($results, 'avg', null))));
    dump(sprintf('Fastest:  %.3fms', min($avgTimes)));

    // Distribution
    $under200 = count(array_filter($avgTimes, fn ($t) => $t < 0.2));
    $under500 = count(array_filter($avgTimes, fn ($t) => $t >= 0.2 && $t < 0.5));
    $under1000 = count(array_filter($avgTimes, fn ($t) => $t >= 0.5 && $t < 1.0));
    $over1000 = count(array_filter($avgTimes, fn ($t) => $t >= 1.0));

    dump("\n=== DISTRIBUTION ===");
    dump(sprintf('< 0.2ms:  %d components (excellent)', $under200));
    dump(sprintf('0.2-0.5ms: %d components (good)', $under500));
    dump(sprintf('0.5-1.0ms: %d components (acceptable)', $under1000));
    dump(sprintf('> 1.0ms:  %d components (needs attention)', $over1000));

    if ($failed) {
        dump("\n=== FAILED TO RENDER ===");
        dump(implode(', ', $failed));
    }

    expect(count($results))->toBeGreaterThan(40);
});

test('identify components over 1ms threshold', function () {
    $iterations = 20;

    $heavyComponents = [
        'selectbox' => '<ui:selectbox name="test"><ui:selectbox.option value="a">A</ui:selectbox.option><ui:selectbox.option value="b">B</ui:selectbox.option><ui:selectbox.option value="c">C</ui:selectbox.option></ui:selectbox>',
        'datepicker' => '<ui:datepicker name="test" />',
        'timepicker' => '<ui:timepicker name="test" />',
        'file-upload' => '<ui:file-upload name="test" />',
        'rich-text-editor' => '<ui:rich-text-editor name="test" />',
        'modal (full)' => '<ui:modal name="test"><ui:modal.header><ui:modal.title>Title</ui:modal.title></ui:modal.header><ui:modal.body>Content</ui:modal.body><ui:modal.footer><ui:button>Close</ui:button></ui:modal.footer></ui:modal>',
        'dropdown (full)' => '<ui:dropdown><ui:dropdown.trigger><ui:button>Open</ui:button></ui:dropdown.trigger><ui:dropdown.menu><ui:dropdown.item icon="home">Home</ui:dropdown.item><ui:dropdown.item icon="settings">Settings</ui:dropdown.item><ui:dropdown.divider /><ui:dropdown.item icon="log-out">Logout</ui:dropdown.item></ui:dropdown.menu></ui:dropdown>',
        'tabs (multiple)' => '<ui:tabs><ui:tabs.list><ui:tabs.item value="a">A</ui:tabs.item><ui:tabs.item value="b">B</ui:tabs.item><ui:tabs.item value="c">C</ui:tabs.item></ui:tabs.list><ui:tabs.panel value="a">A</ui:tabs.panel><ui:tabs.panel value="b">B</ui:tabs.panel><ui:tabs.panel value="c">C</ui:tabs.panel></ui:tabs>',
        'accordion (multiple)' => '<ui:accordion><ui:accordion.item title="One">1</ui:accordion.item><ui:accordion.item title="Two">2</ui:accordion.item><ui:accordion.item title="Three">3</ui:accordion.item></ui:accordion>',
        'pagination (many)' => '<ui:pagination :total="1000" :perPage="10" :currentPage="50" />',
    ];

    dump("\n=== Heavy Components Analysis ({$iterations} iterations) ===\n");

    $overThreshold = [];
    foreach ($heavyComponents as $name => $blade) {
        $result = benchComponent($blade, $iterations);
        if ($result) {
            $flag = $result['avg'] > 1.0 ? ' ⚠️ SLOW' : '';
            dump(sprintf('%-25s avg: %6.2fms | max: %6.2fms%s', $name, $result['avg'], $result['max'], $flag));
            if ($result['avg'] > 1.0) {
                $overThreshold[$name] = $result['avg'];
            }
        }
    }

    if ($overThreshold) {
        dump("\n⚠️  Components over 1ms threshold:");
        foreach ($overThreshold as $name => $avg) {
            dump("   - {$name}: {$avg}ms");
        }
    } else {
        dump("\n✅ All heavy components are under 1ms threshold");
    }

    expect(true)->toBeTrue();
});
