@props([
    'disabled' => false,
    'length' => 6,
    'mode' => 'numeric',
    'name' => null,
    'private' => false,
    'separator' => null,
    'size' => null,
    'value' => '',
])

@php
    $id = $attributes->get('id') ?? ($name ? 'input-otp-' . $name : 'input-otp-' . uniqid());

    $pattern = match($mode) {
        'alphanumeric' => '[a-zA-Z0-9]',
        'alpha' => '[a-zA-Z]',
        default => '\\d',
    };

    $inputmode = match($mode) {
        'alphanumeric', 'alpha' => 'text',
        default => 'numeric',
    };

    $slot_size_classes = match($size) {
        'sm' => 'h-9 w-8 text-sm',
        'lg' => 'h-14 w-12 text-xl',
        default => 'h-12 w-10 text-lg',
    };

    $wrapper_classes = [
        'flex items-center gap-2',
        'opacity-50' => $disabled,
    ];
@endphp

<div
    x-data="{
        length: {{ $length }},
        disabled: {{ $disabled ? 'true' : 'false' }},
        private: {{ $private ? 'true' : 'false' }},
        pattern: /{{ $pattern }}/,
        digits: Array({{ $length }}).fill('').map((_, i) => '{{ $value }}'.charAt(i) || ''),
        activeIndex: -1,
        get value() {
            return this.digits.join('');
        },
        set value(val) {
            this.digits = Array(this.length).fill('').map((_, i) => val.charAt(i) || '');
        },
        focusIndex(index) {
            if (this.disabled) return;
            this.activeIndex = index;
            this.$refs.input.focus();
        },
        handleInput(e) {
            const val = e.target.value.split('').filter(c => this.pattern.test(c)).join('');
            if (val) {
                const chars = val.split('');
                let index = this.activeIndex >= 0 ? this.activeIndex : 0;
                chars.forEach(char => {
                    if (index < this.length) {
                        this.digits[index] = char;
                        index++;
                    }
                });
                this.activeIndex = Math.min(index, this.length - 1);
                this.dispatchChange();
            }
            e.target.value = '';
        },
        handleKeydown(e) {
            if (e.key === 'Backspace') {
                e.preventDefault();
                if (this.activeIndex >= 0) {
                    if (this.digits[this.activeIndex]) {
                        this.digits[this.activeIndex] = '';
                    } else if (this.activeIndex > 0) {
                        this.activeIndex--;
                        this.digits[this.activeIndex] = '';
                    }
                    this.dispatchChange();
                }
            } else if (e.key === 'ArrowLeft' && this.activeIndex > 0) {
                this.activeIndex--;
            } else if (e.key === 'ArrowRight' && this.activeIndex < this.length - 1) {
                this.activeIndex++;
            } else if (e.key === 'Delete') {
                e.preventDefault();
                if (this.activeIndex >= 0 && this.activeIndex < this.length) {
                    this.digits[this.activeIndex] = '';
                    this.dispatchChange();
                }
            }
        },
        handleFocus() {
            if (this.activeIndex < 0) {
                const firstEmpty = this.digits.findIndex(d => d === '');
                this.activeIndex = firstEmpty >= 0 ? firstEmpty : this.length - 1;
            }
        },
        handleBlur() {
            this.activeIndex = -1;
        },
        handlePaste(e) {
            e.preventDefault();
            const paste = (e.clipboardData || window.clipboardData).getData('text').split('').filter(c => this.pattern.test(c)).join('');
            if (paste) {
                const chars = paste.split('').slice(0, this.length);
                chars.forEach((char, i) => {
                    this.digits[i] = char;
                });
                this.activeIndex = Math.min(chars.length, this.length - 1);
                this.dispatchChange();
            }
        },
        dispatchChange() {
            this.$nextTick(() => {
                this.$refs.hidden.dispatchEvent(new Event('input', { bubbles: true }));
            });
        },
        displayChar(char) {
            if (!char) return '';
            return this.private ? '•' : char;
        }
    }"
    {{ $attributes->except(['id', 'name', 'value'])->class($wrapper_classes) }}
    data-input-otp
>
    <input
        type="hidden"
        x-ref="hidden"
        id="{{ $id }}"
        @if ($name) name="{{ $name }}" @endif
        :value="value"
        {{ $attributes->only(['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.defer', 'x-model']) }}
    />

    @if ($slot->isNotEmpty())
        {{ $slot }}
    @elseif ($separator)
        @php
            $groups = collect(range(0, $length - 1))->chunk($separator);
        @endphp

        @foreach ($groups as $groupIndex => $group)
            <div class="flex items-center" data-input-otp-group>
                @foreach ($group as $index)
                    <div
                        class="{{ $slot_size_classes }} relative flex cursor-text items-center justify-center border-y border-r font-medium transition-colors first:rounded-l-lg first:border-l last:rounded-r-lg border-gray-200 bg-white text-gray-900 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100"
                        :class="{
                            'z-10 ring-2 ring-offset-0 ring-gray-900 dark:ring-gray-100': activeIndex === {{ $index }},
                        }"
                        @click="focusIndex({{ $index }})"
                        data-input-otp-slot
                    >
                        <span x-text="displayChar(digits[{{ $index }}])"></span>
                    </div>
                @endforeach
            </div>

            @if (!$loop->last)
                <div class="flex items-center justify-center px-1" data-input-otp-separator>
                    <div class="h-1 w-2 rounded-full bg-gray-300 dark:bg-gray-600"></div>
                </div>
            @endif
        @endforeach
    @else
        <div class="flex items-center" data-input-otp-group>
            @for ($i = 0; $i < $length; $i++)
                <div
                    class="{{ $slot_size_classes }} relative flex cursor-text items-center justify-center border-y border-r font-medium transition-colors first:rounded-l-lg first:border-l last:rounded-r-lg border-gray-200 bg-white text-gray-900 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100"
                    :class="{
                        'z-10 ring-2 ring-offset-0 ring-gray-900 dark:ring-gray-100': activeIndex === {{ $i }},
                    }"
                    @click="focusIndex({{ $i }})"
                    data-input-otp-slot
                >
                    <span x-text="displayChar(digits[{{ $i }}])"></span>
                </div>
            @endfor
        </div>
    @endif

    <input
        type="text"
        inputmode="{{ $inputmode }}"
        autocomplete="one-time-code"
        x-ref="input"
        class="sr-only"
        maxlength="{{ $length }}"
        @input="handleInput($event)"
        @keydown="handleKeydown($event)"
        @focus="handleFocus()"
        @blur="handleBlur()"
        @paste="handlePaste($event)"
        @disabled($disabled)
    />
</div>
