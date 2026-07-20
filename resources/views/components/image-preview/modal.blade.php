<div
    x-data="{ src: null }"
    x-on:image-preview.window="src = $event.detail.src; let y = window.scrollY; $flux.modal('image-preview').show(); requestAnimationFrame(() => window.scrollTo(0, y))"
>
    <flux:modal name="image-preview" variant="bare" class="flex items-center justify-center p-8">
        <img x-bind:src="src" class="max-h-[80vh] max-w-[80vw] rounded-lg object-contain" />
    </flux:modal>
</div>
