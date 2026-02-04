@props(['code', 'message' => null])

@php
    $title = __("errors.{$code}_title");
    $description = $message ?: __("errors.{$code}_body");

    $classes = Ui::classes()->add('flex flex-col items-center justify-center h-full text-center');

    $titleClasses = Ui::classes()
        ->add('text-[6rem] leading-none font-semibold tracking-tight')
        ->add('text-gray-800')
        ->add('dark:text-gray-100');

    $descriptionClasses = Ui::classes()->add('mt-1 max-w-sm text-sm')->add('text-gray-500')->add('dark:text-gray-400');
@endphp

<div {{ $attributes->class($classes) }} data-layout-error>
    <div class="w-full max-w-lg flex flex-col items-center">
        <h1 class="{{ $titleClasses }}">{{ $title }}</h1>

        <p class="{{ $descriptionClasses }}">{{ $description }}</p>

        <div class="mt-8">
            <ui:button href="/" icon="arrow-left">{{ __('common.go_back') }}</ui:button>
        </div>
    </div>
</div>
