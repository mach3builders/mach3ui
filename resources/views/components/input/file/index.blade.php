@props([
    'accept' => null,
    'buttonText' => 'Browse',
    'multiple' => false,
    'placeholder' => 'No file chosen',
])

<div
    x-data="{
        fileName: '',
        get displayText() {
            return this.fileName || '{{ $placeholder }}';
        },
        handleChange(e) {
            const files = Array.from(e.target.files);
            if (files.length === 0) {
                this.fileName = '';
            } else if (files.length === 1) {
                this.fileName = files[0].name;
            } else {
                this.fileName = files.length + ' files selected';
            }
        }
    }"
    {{ $attributes->only('class')->class(['relative flex w-full']) }}
    data-input-file
>
    <span class="block h-10 min-w-0 flex-1 truncate rounded-s-md border border-r-0 px-3 py-2 text-sm border-gray-140 bg-white text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400" x-text="displayText"></span>

    <span class="btn inline-flex h-10 shrink-0 cursor-pointer select-none items-center justify-center gap-2 whitespace-nowrap rounded-e-md border px-4 text-xs font-semibold uppercase border-gray-120 bg-white text-gray-700 shadow-xs hover:bg-gray-20 hover:text-gray-900 dark:border-gray-690 dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-gray-780 dark:hover:text-gray-20">
        {{ $buttonText }}
    </span>

    <input
        type="file"
        {{ $attributes->except('class')->merge(['class' => 'absolute inset-0 cursor-pointer opacity-0']) }}
        @if ($accept) accept="{{ $accept }}" @endif
        @if ($multiple) multiple @endif
        x-on:change="handleChange($event)"
    />
</div>
