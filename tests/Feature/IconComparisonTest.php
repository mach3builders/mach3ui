<?php

use Illuminate\Support\Facades\Blade;

function benchmark(string $blade, int $iterations = 50): float
{
    // Warmup
    Blade::render($blade);

    $start = hrtime(true);
    for ($i = 0; $i < $iterations; $i++) {
        Blade::render($blade);
    }

    return (hrtime(true) - $start) / 1_000_000 / $iterations;
}

test('compare optimized vs old icon implementation', function () {
    // Skip: _old component has been removed after optimization was validated
    $this->markTestSkipped('Old icon component (_old) has been removed.');

    $iterations = 50;

    // Test optimized version (svg() helper)
    $optimizedSingle = benchmark('<ui:icon name="check" />', $iterations);
    $optimized10 = benchmark(str_repeat('<ui:icon name="check" />', 10), $iterations);
    $optimized50 = benchmark(str_repeat('<ui:icon name="check" />', 50), $iterations);

    // Test old version (x-dynamic-component)
    $oldSingle = benchmark('<ui:icon._old name="check" />', $iterations);
    $old10 = benchmark(str_repeat('<ui:icon._old name="check" />', 10), $iterations);
    $old50 = benchmark(str_repeat('<ui:icon._old name="check" />', 50), $iterations);

    // Test raw svg() for baseline
    $rawStart = hrtime(true);
    for ($i = 0; $i < $iterations * 50; $i++) {
        svg('lucide-check', 'size-4')->toHtml();
    }
    $raw50 = (hrtime(true) - $rawStart) / 1_000_000 / $iterations;

    dump("\n=== Icon Implementation Comparison ({$iterations} iterations) ===\n");
    dump(sprintf('%-25s %8s %8s %8s', '', '1 icon', '10 icons', '50 icons'));
    dump(sprintf('%-25s %7.2fms %7.2fms %7.2fms', 'Optimized (svg())', $optimizedSingle, $optimized10, $optimized50));
    dump(sprintf('%-25s %7.2fms %7.2fms %7.2fms', 'Old (x-dynamic)', $oldSingle, $old10, $old50));
    dump(sprintf('%-25s %7.2fms %7.2fms %7.2fms', 'Raw svg() baseline', $raw50 / 50, $raw50 / 5, $raw50));

    dump("\n=== Performance Improvement ===");
    dump(sprintf('Single icon: %.1f%% faster', (1 - $optimizedSingle / $oldSingle) * 100));
    dump(sprintf('10 icons:    %.1f%% faster', (1 - $optimized10 / $old10) * 100));
    dump(sprintf('50 icons:    %.1f%% faster', (1 - $optimized50 / $old50) * 100));

    dump("\n=== Per-Icon Cost ===");
    dump(sprintf('Optimized: %.3fms per icon', ($optimized50 - $optimizedSingle) / 49));
    dump(sprintf('Old:       %.3fms per icon', ($old50 - $oldSingle) / 49));

    // The optimized version scales better - per-icon cost should be lower
    $optimizedPerIcon = ($optimized50 - $optimizedSingle) / 49;
    $oldPerIcon = ($old50 - $oldSingle) / 49;

    expect($optimizedPerIcon)->toBeLessThan($oldPerIcon);
    expect($optimized50)->toBeLessThan($old50);
});
