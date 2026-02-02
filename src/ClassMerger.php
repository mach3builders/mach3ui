<?php

namespace Mach3Builders\Ui;

class ClassMerger
{
    // Hiërarchische groepen: als user 'p-4' geeft, verwijder ook px-, py-, pt-, etc.
    private const HIERARCHY_GROUPS = [
        'p' => ['p', 'px', 'py', 'pt', 'pr', 'pb', 'pl', 'ps', 'pe'],
        'px' => ['px', 'pl', 'pr', 'ps', 'pe'],
        'py' => ['py', 'pt', 'pb'],
        'm' => ['m', 'mx', 'my', 'mt', 'mr', 'mb', 'ml', 'ms', 'me'],
        'mx' => ['mx', 'ml', 'mr', 'ms', 'me'],
        'my' => ['my', 'mt', 'mb'],
        'gap' => ['gap', 'gap-x', 'gap-y'],
        'size' => ['size', 'w', 'h'],
        'inset' => ['inset', 'inset-x', 'inset-y', 'top', 'right', 'bottom', 'left'],
        'inset-x' => ['inset-x', 'left', 'right'],
        'inset-y' => ['inset-y', 'top', 'bottom'],
        'rounded' => ['rounded', 'rounded-t', 'rounded-r', 'rounded-b', 'rounded-l',
            'rounded-tl', 'rounded-tr', 'rounded-br', 'rounded-bl'],
        'rounded-t' => ['rounded-t', 'rounded-tl', 'rounded-tr'],
        'rounded-b' => ['rounded-b', 'rounded-bl', 'rounded-br'],
        'rounded-l' => ['rounded-l', 'rounded-tl', 'rounded-bl'],
        'rounded-r' => ['rounded-r', 'rounded-tr', 'rounded-br'],
        'overflow' => ['overflow', 'overflow-x', 'overflow-y'],
        'overscroll' => ['overscroll', 'overscroll-x', 'overscroll-y'],
        'scroll-m' => ['scroll-m', 'scroll-mx', 'scroll-my', 'scroll-mt', 'scroll-mr', 'scroll-mb', 'scroll-ml', 'scroll-ms', 'scroll-me'],
        'scroll-mx' => ['scroll-mx', 'scroll-ml', 'scroll-mr', 'scroll-ms', 'scroll-me'],
        'scroll-my' => ['scroll-my', 'scroll-mt', 'scroll-mb'],
        'scroll-p' => ['scroll-p', 'scroll-px', 'scroll-py', 'scroll-pt', 'scroll-pr', 'scroll-pb', 'scroll-pl', 'scroll-ps', 'scroll-pe'],
        'scroll-px' => ['scroll-px', 'scroll-pl', 'scroll-pr', 'scroll-ps', 'scroll-pe'],
        'scroll-py' => ['scroll-py', 'scroll-pt', 'scroll-pb'],
        'scale' => ['scale', 'scale-x', 'scale-y'],
        'translate' => ['translate', 'translate-x', 'translate-y'],
        'skew' => ['skew', 'skew-x', 'skew-y'],
    ];

    // Semantische subgroepen voor ambigue prefixes
    private const TEXT_SIZES = ['text-xs', 'text-sm', 'text-base', 'text-lg', 'text-xl',
        'text-2xl', 'text-3xl', 'text-4xl', 'text-5xl', 'text-6xl',
        'text-7xl', 'text-8xl', 'text-9xl'];

    private const TEXT_ALIGNS = ['text-left', 'text-center', 'text-right', 'text-justify',
        'text-start', 'text-end'];

    private const TEXT_DECORATION = ['underline', 'overline', 'line-through', 'no-underline'];

    private const TEXT_TRANSFORM = ['uppercase', 'lowercase', 'capitalize', 'normal-case'];

    private const FONT_FAMILIES = ['font-sans', 'font-serif', 'font-mono'];

    private const FONT_STYLE = ['italic', 'not-italic'];

    private const BORDER_STYLES = ['border-solid', 'border-dashed', 'border-dotted',
        'border-double', 'border-hidden', 'border-none'];

    private const DISPLAY = ['block', 'inline-block', 'inline', 'flex', 'inline-flex',
        'table', 'inline-table', 'table-caption', 'table-cell', 'table-column',
        'table-column-group', 'table-footer-group', 'table-header-group',
        'table-row-group', 'table-row', 'flow-root', 'grid', 'inline-grid',
        'contents', 'list-item', 'hidden'];

    private const FLEX_DIRECTION = ['flex-row', 'flex-row-reverse', 'flex-col', 'flex-col-reverse'];

    private const FLEX_WRAP = ['flex-wrap', 'flex-wrap-reverse', 'flex-nowrap'];

    private const ITEMS = ['items-start', 'items-end', 'items-center', 'items-baseline', 'items-stretch'];

    private const JUSTIFY = ['justify-normal', 'justify-start', 'justify-end', 'justify-center',
        'justify-between', 'justify-around', 'justify-evenly', 'justify-stretch'];

    private const JUSTIFY_ITEMS = ['justify-items-start', 'justify-items-end', 'justify-items-center',
        'justify-items-stretch'];

    private const JUSTIFY_SELF = ['justify-self-auto', 'justify-self-start', 'justify-self-end',
        'justify-self-center', 'justify-self-stretch'];

    private const CONTENT = ['content-normal', 'content-start', 'content-end', 'content-center',
        'content-between', 'content-around', 'content-evenly', 'content-baseline', 'content-stretch'];

    private const PLACE_CONTENT = ['place-content-start', 'place-content-end', 'place-content-center',
        'place-content-between', 'place-content-around', 'place-content-evenly',
        'place-content-baseline', 'place-content-stretch'];

    private const PLACE_ITEMS = ['place-items-start', 'place-items-end', 'place-items-center',
        'place-items-baseline', 'place-items-stretch'];

    private const PLACE_SELF = ['place-self-auto', 'place-self-start', 'place-self-end',
        'place-self-center', 'place-self-stretch'];

    private const SELF = ['self-auto', 'self-start', 'self-end', 'self-center',
        'self-stretch', 'self-baseline'];

    private const POSITION = ['static', 'fixed', 'absolute', 'relative', 'sticky'];

    private const VISIBILITY = ['visible', 'invisible', 'collapse'];

    private const FLOAT = ['float-start', 'float-end', 'float-right', 'float-left', 'float-none'];

    private const CLEAR = ['clear-start', 'clear-end', 'clear-left', 'clear-right',
        'clear-both', 'clear-none'];

    private const OBJECT_FIT = ['object-contain', 'object-cover', 'object-fill',
        'object-none', 'object-scale-down'];

    private const OBJECT_POSITION = ['object-bottom', 'object-center', 'object-left',
        'object-left-bottom', 'object-left-top', 'object-right', 'object-right-bottom',
        'object-right-top', 'object-top'];

    private const WHITESPACE = ['whitespace-normal', 'whitespace-nowrap', 'whitespace-pre',
        'whitespace-pre-line', 'whitespace-pre-wrap', 'whitespace-break-spaces'];

    private const WORD_BREAK = ['break-normal', 'break-words', 'break-all', 'break-keep'];

    private const POINTER_EVENTS = ['pointer-events-none', 'pointer-events-auto'];

    private const USER_SELECT = ['select-none', 'select-text', 'select-all', 'select-auto'];

    private const RESIZE = ['resize-none', 'resize-y', 'resize-x', 'resize'];

    private const CURSOR = ['cursor-auto', 'cursor-default', 'cursor-pointer', 'cursor-wait',
        'cursor-text', 'cursor-move', 'cursor-help', 'cursor-not-allowed', 'cursor-none',
        'cursor-context-menu', 'cursor-progress', 'cursor-cell', 'cursor-crosshair',
        'cursor-vertical-text', 'cursor-alias', 'cursor-copy', 'cursor-no-drop',
        'cursor-grab', 'cursor-grabbing', 'cursor-all-scroll', 'cursor-col-resize',
        'cursor-row-resize', 'cursor-n-resize', 'cursor-e-resize', 'cursor-s-resize',
        'cursor-w-resize', 'cursor-ne-resize', 'cursor-nw-resize', 'cursor-se-resize',
        'cursor-sw-resize', 'cursor-ew-resize', 'cursor-ns-resize', 'cursor-nesw-resize',
        'cursor-nwse-resize', 'cursor-zoom-in', 'cursor-zoom-out'];

    private const LIST_STYLE_TYPE = ['list-none', 'list-disc', 'list-decimal'];

    private const LIST_STYLE_POSITION = ['list-inside', 'list-outside'];

    private const SR = ['sr-only', 'not-sr-only'];

    private const ISOLATION = ['isolate', 'isolation-auto'];

    private const BOX_DECORATION = ['box-decoration-clone', 'box-decoration-slice'];

    private const BOX_SIZING = ['box-border', 'box-content'];

    private const TABLE_LAYOUT = ['table-auto', 'table-fixed'];

    private const CAPTION_SIDE = ['caption-top', 'caption-bottom'];

    private const BORDER_COLLAPSE = ['border-collapse', 'border-separate'];

    public static function merge(string $componentClasses, string $userClasses): string
    {
        if (empty(trim($userClasses))) {
            return $componentClasses;
        }

        $userGroups = self::extractGroups($userClasses);
        $filteredComponent = self::filterClasses($componentClasses, $userGroups);

        return trim($filteredComponent.' '.$userClasses);
    }

    /**
     * @return array<string>
     */
    private static function extractGroups(string $classes): array
    {
        $groups = [];
        foreach (preg_split('/\s+/', trim($classes)) as $class) {
            $group = self::getGroup($class);
            if ($group !== null) {
                $groups[] = $group;
                // Expand hierarchical groups
                if (isset(self::HIERARCHY_GROUPS[$group])) {
                    $groups = array_merge($groups, self::HIERARCHY_GROUPS[$group]);
                }
            }
        }

        return array_unique($groups);
    }

    private static function getGroup(string $class): ?string
    {
        // Extract variant prefix (hover:, dark:, md:, xl:, etc.)
        $variantPrefix = '';
        if (preg_match('/^((?:[a-z0-9-]+:)+)/', $class, $matches) === 1) {
            $variantPrefix = $matches[1];
        }

        // Strip variants to get base class
        $base = preg_replace('/^([a-z0-9-]+:)+/', '', $class);
        if ($base === null) {
            return null;
        }
        // Strip negative prefix and ! modifiers
        $base = trim($base, '-!');

        // Semantic subgroups for ambiguous prefixes
        if (in_array($base, self::TEXT_SIZES, true)) {
            return $variantPrefix.'text-size';
        }
        if (in_array($base, self::TEXT_ALIGNS, true)) {
            return $variantPrefix.'text-align';
        }
        if (in_array($base, self::TEXT_DECORATION, true)) {
            return $variantPrefix.'text-decoration';
        }
        if (in_array($base, self::TEXT_TRANSFORM, true)) {
            return $variantPrefix.'text-transform';
        }
        if (str_starts_with($base, 'text-')) {
            return $variantPrefix.'text-color';
        }

        if (in_array($base, self::FONT_FAMILIES, true)) {
            return $variantPrefix.'font-family';
        }
        if (in_array($base, self::FONT_STYLE, true)) {
            return $variantPrefix.'font-style';
        }
        if (str_starts_with($base, 'font-')) {
            return $variantPrefix.'font-weight';
        }

        if (in_array($base, self::BORDER_STYLES, true)) {
            return $variantPrefix.'border-style';
        }
        if (in_array($base, self::BORDER_COLLAPSE, true)) {
            return $variantPrefix.'border-collapse';
        }
        if (preg_match('/^border(-[trblxyse])?-\d/', $base) === 1) {
            return $variantPrefix.'border-width';
        }
        if (preg_match('/^border(-[trblxyse])?-[a-z]+-\d/', $base) === 1) {
            return $variantPrefix.'border-color';
        }

        // Display
        if (in_array($base, self::DISPLAY, true)) {
            return $variantPrefix.'display';
        }

        // Flexbox
        if (in_array($base, self::FLEX_DIRECTION, true)) {
            return $variantPrefix.'flex-direction';
        }
        if (in_array($base, self::FLEX_WRAP, true)) {
            return $variantPrefix.'flex-wrap';
        }

        // Alignment
        if (in_array($base, self::ITEMS, true)) {
            return $variantPrefix.'align-items';
        }
        if (in_array($base, self::JUSTIFY, true)) {
            return $variantPrefix.'justify-content';
        }
        if (in_array($base, self::JUSTIFY_ITEMS, true)) {
            return $variantPrefix.'justify-items';
        }
        if (in_array($base, self::JUSTIFY_SELF, true)) {
            return $variantPrefix.'justify-self';
        }
        if (in_array($base, self::CONTENT, true)) {
            return $variantPrefix.'align-content';
        }
        if (in_array($base, self::PLACE_CONTENT, true)) {
            return $variantPrefix.'place-content';
        }
        if (in_array($base, self::PLACE_ITEMS, true)) {
            return $variantPrefix.'place-items';
        }
        if (in_array($base, self::PLACE_SELF, true)) {
            return $variantPrefix.'place-self';
        }
        if (in_array($base, self::SELF, true)) {
            return $variantPrefix.'align-self';
        }

        // Position & visibility
        if (in_array($base, self::POSITION, true)) {
            return $variantPrefix.'position';
        }
        if (in_array($base, self::VISIBILITY, true)) {
            return $variantPrefix.'visibility';
        }
        if (in_array($base, self::FLOAT, true)) {
            return $variantPrefix.'float';
        }
        if (in_array($base, self::CLEAR, true)) {
            return $variantPrefix.'clear';
        }

        // Object
        if (in_array($base, self::OBJECT_FIT, true)) {
            return $variantPrefix.'object-fit';
        }
        if (in_array($base, self::OBJECT_POSITION, true)) {
            return $variantPrefix.'object-position';
        }

        // Typography
        if (in_array($base, self::WHITESPACE, true)) {
            return $variantPrefix.'whitespace';
        }
        if (in_array($base, self::WORD_BREAK, true)) {
            return $variantPrefix.'word-break';
        }

        // Interactivity
        if (in_array($base, self::POINTER_EVENTS, true)) {
            return $variantPrefix.'pointer-events';
        }
        if (in_array($base, self::USER_SELECT, true)) {
            return $variantPrefix.'user-select';
        }
        if (in_array($base, self::RESIZE, true)) {
            return $variantPrefix.'resize';
        }
        if (in_array($base, self::CURSOR, true)) {
            return $variantPrefix.'cursor';
        }

        // Lists
        if (in_array($base, self::LIST_STYLE_TYPE, true)) {
            return $variantPrefix.'list-style-type';
        }
        if (in_array($base, self::LIST_STYLE_POSITION, true)) {
            return $variantPrefix.'list-style-position';
        }

        // Accessibility
        if (in_array($base, self::SR, true)) {
            return $variantPrefix.'sr';
        }

        // Box
        if (in_array($base, self::ISOLATION, true)) {
            return $variantPrefix.'isolation';
        }
        if (in_array($base, self::BOX_DECORATION, true)) {
            return $variantPrefix.'box-decoration';
        }
        if (in_array($base, self::BOX_SIZING, true)) {
            return $variantPrefix.'box-sizing';
        }

        // Table
        if (in_array($base, self::TABLE_LAYOUT, true)) {
            return $variantPrefix.'table-layout';
        }
        if (in_array($base, self::CAPTION_SIDE, true)) {
            return $variantPrefix.'caption-side';
        }

        // Generic prefix extraction: "px-4" → "px", "bg-red-500" → "bg"
        if (preg_match('/^([a-z]+(?:-[a-z]+)*?)(?:-(?:\d|auto|full|screen|min|max|fit|\[).*)$/', $base, $m) === 1) {
            return $variantPrefix.$m[1];
        }

        return $variantPrefix.$base; // Fallback to full class as its own group
    }

    /**
     * @param  array<string>  $groupsToRemove
     */
    private static function filterClasses(string $classes, array $groupsToRemove): string
    {
        $result = [];
        foreach (preg_split('/\s+/', trim($classes)) as $class) {
            $group = self::getGroup($class);
            if ($group === null || ! in_array($group, $groupsToRemove, true)) {
                $result[] = $class;
            }
        }

        return implode(' ', $result);
    }
}
