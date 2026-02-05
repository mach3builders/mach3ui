@props([
    'activeRingClasses' => '',
    'attributes' => null,
    'disabled' => false,
    'error' => null,
    'id' => null,
    'inputmode' => 'numeric',
    'length' => 6,
    'mode' => 'numeric',
    'name' => null,
    'pattern' => '\\d',
    'private' => false,
    'separator' => null,
    'separatorClasses' => '',
    'separatorDotClasses' => '',
    'slot' => null,
    'slotClasses' => '',
    'value' => '',
    'wrapperClasses' => '',
])

<div x-data="{
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
}" x-modelable="value" {{ $attributes->whereStartsWith('x-model') }}
    class="{{ $wrapperClasses }}" {{ $attributes->only('data-*') }} data-input-otp data-control @if ($error)
    aria-invalid="true"
    @endif>

    <input type="hidden" x-ref="hidden" id="{{ $id }}"
        @if ($name) name="{{ $name }}" @endif :value="value"
        {{ $attributes->whereStartsWith('wire:model') }} />

    @if ($slot && $slot->isNotEmpty())
        {{ $slot }}
    @elseif ($separator)
        @php
            $groups = array_chunk(range(0, $length - 1), $separator);
        @endphp

        @foreach ($groups as $groupIndex => $group)
            <div class="flex items-center" data-input-otp-group>
                @foreach ($group as $index)
                    <div class="{{ $slotClasses }}"
                        :class="{ '{{ $activeRingClasses }}': activeIndex === {{ $index }} }"
                        x-on:click="focusIndex({{ $index }})" data-input-otp-slot>
                        <span x-text="displayChar(digits[{{ $index }}])"></span>
                    </div>
                @endforeach
            </div>

            @if (!$loop->last)
                <div class="{{ $separatorClasses }}" data-input-otp-separator>
                    <div class="{{ $separatorDotClasses }}"></div>
                </div>
            @endif
        @endforeach
    @else
        <div class="flex items-center" data-input-otp-group>
            @for ($i = 0; $i < $length; $i++)
                <div class="{{ $slotClasses }}"
                    :class="{ '{{ $activeRingClasses }}': activeIndex === {{ $i }} }"
                    x-on:click="focusIndex({{ $i }})" data-input-otp-slot>
                    <span x-text="displayChar(digits[{{ $i }}])"></span>
                </div>
            @endfor
        </div>
    @endif

    <input type="text" inputmode="{{ $inputmode }}" autocomplete="one-time-code" x-ref="input" class="sr-only"
        maxlength="{{ $length }}" x-on:input="handleInput($event)" x-on:keydown="handleKeydown($event)"
        x-on:focus="handleFocus()" x-on:blur="handleBlur()" x-on:paste="handlePaste($event)"
        @disabled($disabled) />
</div>
