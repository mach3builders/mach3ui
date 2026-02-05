<?php

use Illuminate\Support\Facades\Blade;

// =============================================================================
// input.file Component Tests
// =============================================================================

it('renders a basic file input', function () {
    $html = Blade::render('<ui:input.file name="document" />');

    expect($html)
        ->toContain('type="file"')
        ->toContain('name="document"')
        ->toContain('data-input-file');
});

it('renders file input with label', function () {
    $html = Blade::render('<ui:input.file name="document" label="Upload Document" />');

    expect($html)
        ->toContain('Upload Document')
        ->toContain('<label')
        ->toContain('for=');
});

it('renders file input with hint', function () {
    $html = Blade::render('<ui:input.file name="document" label="Document" hint="Max 5MB" />');

    expect($html)
        ->toContain('Max 5MB');
});

it('renders file input with accept attribute', function () {
    $html = Blade::render('<ui:input.file name="image" accept="image/*" />');

    expect($html)
        ->toContain('accept="image/*"');
});

it('renders file input with multiple attribute', function () {
    $html = Blade::render('<ui:input.file name="documents" :multiple="true" />');

    expect($html)
        ->toContain('multiple')
        ->toContain('Choose files'); // Plural when multiple
});

it('renders single file input without multiple', function () {
    $html = Blade::render('<ui:input.file name="document" />');

    expect($html)
        ->not->toContain(' multiple')
        ->toContain('Choose file'); // Singular when not multiple
});

it('applies size variants', function () {
    $htmlSm = Blade::render('<ui:input.file name="doc" size="sm" />');
    $htmlMd = Blade::render('<ui:input.file name="doc" size="md" />');
    $htmlLg = Blade::render('<ui:input.file name="doc" size="lg" />');

    expect($htmlSm)->toContain('min-h-8');
    expect($htmlMd)->toContain('min-h-10');
    expect($htmlLg)->toContain('min-h-12');
});

it('uses custom id when provided', function () {
    $html = Blade::render('<ui:input.file name="document" id="custom-file-id" />');

    expect($html)
        ->toContain('id="custom-file-id"');
});

it('passes through additional attributes', function () {
    $html = Blade::render('<ui:input.file name="document" required disabled />');

    expect($html)
        ->toContain('required')
        ->toContain('disabled');
});

it('passes through data attributes', function () {
    $html = Blade::render('<ui:input.file name="document" data-testid="file-upload" data-max-size="5000000" />');

    expect($html)
        ->toContain('data-testid="file-upload"')
        ->toContain('data-max-size="5000000"');
});

it('shows error message from error bag', function () {
    $this->withErrors(['document' => 'Please upload a valid document.']);

    $html = Blade::render('<ui:input.file name="document" label="Document" />');

    expect($html)
        ->toContain('Please upload a valid document.')
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});

it('shows error styling without label', function () {
    $this->withErrors(['document' => 'Invalid file']);

    $html = Blade::render('<ui:input.file name="document" />');

    expect($html)
        ->toContain('aria-invalid="true"')
        ->toContain('border-red-500');
});

// =============================================================================
// input.tags Component Tests
// =============================================================================

it('renders a basic tags input', function () {
    $html = Blade::render('<ui:input.tags name="tags" />');

    expect($html)
        ->toContain('data-control')
        ->toContain('x-data')
        ->toContain('x-modelable="tags"');
});

it('renders tags input with label', function () {
    $html = Blade::render('<ui:input.tags name="tags" label="Tags" />');

    expect($html)
        ->toContain('Tags')
        ->toContain('<label');
});

it('renders tags input with hint', function () {
    $html = Blade::render('<ui:input.tags name="tags" label="Tags" hint="Press Enter to add" />');

    expect($html)
        ->toContain('Press Enter to add');
});

it('renders tags input with custom placeholder', function () {
    $html = Blade::render('<ui:input.tags name="tags" placeholder="Type and press enter..." />');

    expect($html)
        ->toContain('placeholder="Type and press enter..."');
});

it('renders tags input with default placeholder', function () {
    $html = Blade::render('<ui:input.tags name="tags" />');

    expect($html)
        ->toContain('placeholder="Add tag..."');
});

it('renders tags input with initial tags array', function () {
    $html = Blade::render('<ui:input.tags name="tags" :tags="[\'php\', \'laravel\']" />');

    // Tags are JSON encoded in the Alpine x-data
    expect($html)
        ->toContain('php')
        ->toContain('laravel');
});

it('applies size variants to tags input', function () {
    $htmlSm = Blade::render('<ui:input.tags name="tags" size="sm" />');
    $htmlMd = Blade::render('<ui:input.tags name="tags" size="md" />');
    $htmlLg = Blade::render('<ui:input.tags name="tags" size="lg" />');

    expect($htmlSm)->toContain('min-h-8');
    expect($htmlMd)->toContain('min-h-10');
    expect($htmlLg)->toContain('min-h-12');
});

it('applies variant styling to tags input', function () {
    $htmlDefault = Blade::render('<ui:input.tags name="tags" variant="default" />');
    $htmlInverted = Blade::render('<ui:input.tags name="tags" variant="inverted" />');

    expect($htmlDefault)->toContain('bg-white');
    expect($htmlInverted)->toContain('bg-gray-10');
});

it('generates id from name for tags input', function () {
    // Tags input uses name as ID base when no explicit ID is provided
    $html = Blade::render('<ui:input.tags name="my-tags" />');

    expect($html)
        ->toContain('data-control');
});

it('passes through attributes to tags input', function () {
    $html = Blade::render('<ui:input.tags name="tags" disabled />');

    expect($html)
        ->toContain('disabled')
        ->toContain('cursor-not-allowed')
        ->toContain('opacity-50');
});

it('passes through data attributes to tags input', function () {
    $html = Blade::render('<ui:input.tags name="tags" data-testid="tags-input" />');

    expect($html)
        ->toContain('data-testid="tags-input"');
});

it('shows error message for tags input', function () {
    $this->withErrors(['tags' => 'Please add at least one tag.']);

    $html = Blade::render('<ui:input.tags name="tags" label="Tags" />');

    expect($html)
        ->toContain('Please add at least one tag.')
        ->toContain('border-red-500');
});

it('hides hint when error is present for tags input', function () {
    $this->withErrors(['tags' => 'Invalid tags']);

    $html = Blade::render('<ui:input.tags name="tags" hint="This hint should be hidden" />');

    expect($html)
        ->not->toContain('This hint should be hidden')
        ->toContain('Invalid tags');
});

it('creates hidden inputs for form submission', function () {
    $html = Blade::render('<ui:input.tags name="skills" />');

    expect($html)
        ->toContain("name=\"'skills[]'\"");
});

// =============================================================================
// input.group Component Tests
// =============================================================================

it('renders an input group wrapper', function () {
    $html = Blade::render('<ui:input.group><span>Content</span></ui:input.group>');

    expect($html)
        ->toContain('data-input-group')
        ->toContain('Content');
});

it('renders input group with slot content', function () {
    $html = Blade::render('
        <ui:input.group>
            <ui:input.addon>https://</ui:input.addon>
            <ui:input name="website" />
        </ui:input.group>
    ');

    expect($html)
        ->toContain('data-input-group')
        ->toContain('https://')
        ->toContain('name="website"');
});

it('passes through attributes to input group', function () {
    $html = Blade::render('<ui:input.group class="custom-class" id="my-group"><span>Test</span></ui:input.group>');

    expect($html)
        ->toContain('custom-class')
        ->toContain('id="my-group"');
});

it('passes through data attributes to input group', function () {
    $html = Blade::render('<ui:input.group data-testid="input-group"><span>Test</span></ui:input.group>');

    expect($html)
        ->toContain('data-testid="input-group"');
});

it('applies border radius classes for grouping', function () {
    $html = Blade::render('<ui:input.group><span>Test</span></ui:input.group>');

    expect($html)
        ->toContain('*:rounded-none')
        ->toContain('*:first:rounded-s-md')
        ->toContain('*:last:rounded-e-md');
});

// =============================================================================
// input.addon Component Tests
// =============================================================================

it('renders an input addon', function () {
    $html = Blade::render('<ui:input.addon>https://</ui:input.addon>');

    expect($html)
        ->toContain('data-input-addon')
        ->toContain('https://');
});

it('renders input addon with slot content', function () {
    $html = Blade::render('<ui:input.addon><ui:icon name="mail" /></ui:input.addon>');

    expect($html)
        ->toContain('data-input-addon')
        ->toContain('<svg'); // Icon rendered
});

it('passes through attributes to input addon', function () {
    $html = Blade::render('<ui:input.addon class="custom-addon" id="my-addon">@</ui:input.addon>');

    expect($html)
        ->toContain('custom-addon')
        ->toContain('id="my-addon"');
});

it('passes through data attributes to input addon', function () {
    $html = Blade::render('<ui:input.addon data-testid="addon">$</ui:input.addon>');

    expect($html)
        ->toContain('data-testid="addon"');
});

it('applies default styling to addon', function () {
    $html = Blade::render('<ui:input.addon>USD</ui:input.addon>');

    expect($html)
        ->toContain('h-10')
        ->toContain('px-3')
        ->toContain('border-gray-140')
        ->toContain('bg-gray-20');
});

// =============================================================================
// file-upload Component Tests
// =============================================================================

it('renders a basic file upload dropzone', function () {
    $html = Blade::render('<ui:file-upload name="files" />');

    expect($html)
        ->toContain('data-file-upload')
        ->toContain('data-file-upload-dropzone')
        ->toContain('type="file"')
        ->toContain('name="files"');
});

it('renders file upload with label', function () {
    $html = Blade::render('<ui:file-upload name="files" label="Upload Files" />');

    expect($html)
        ->toContain('Upload Files')
        ->toContain('<label');
});

it('renders file upload with default placeholder', function () {
    $html = Blade::render('<ui:file-upload name="files" />');

    expect($html)
        ->toContain('Drop files here or click to upload');
});

it('renders file upload with custom placeholder', function () {
    $html = Blade::render('<ui:file-upload name="files" placeholder="Drag your images here" />');

    expect($html)
        ->toContain('Drag your images here');
});

it('renders file upload with hint', function () {
    $html = Blade::render('<ui:file-upload name="files" hint="Only PNG and JPG allowed" />');

    expect($html)
        ->toContain('Only PNG and JPG allowed');
});

it('renders file upload with default hint for single', function () {
    $html = Blade::render('<ui:file-upload name="file" />');

    expect($html)
        ->toContain('Select a file');
});

it('renders file upload with default hint for multiple', function () {
    $html = Blade::render('<ui:file-upload name="files" :multiple="true" />');

    expect($html)
        ->toContain('You can select multiple files');
});

it('renders file upload with accept attribute', function () {
    $html = Blade::render('<ui:file-upload name="images" accept="image/*" />');

    expect($html)
        ->toContain('accept="image/*"');
});

it('renders file upload with multiple attribute', function () {
    $html = Blade::render('<ui:file-upload name="files" :multiple="true" />');

    expect($html)
        ->toContain('multiple')
        ->toContain('name="files[]"'); // Array notation for multiple
});

it('renders single file upload without array notation', function () {
    $html = Blade::render('<ui:file-upload name="file" />');

    expect($html)
        ->toContain('name="file"')
        ->not->toContain('name="file[]"');
});

it('uses custom id for file upload', function () {
    $html = Blade::render('<ui:file-upload name="files" id="custom-upload-id" />');

    expect($html)
        ->toContain('id="custom-upload-id"');
});

it('passes through data attributes to file upload', function () {
    $html = Blade::render('<ui:file-upload name="files" data-testid="dropzone" data-max-files="5" />');

    expect($html)
        ->toContain('data-testid="dropzone"')
        ->toContain('data-max-files="5"');
});

it('shows error message for file upload', function () {
    $this->withErrors(['files' => 'Please upload at least one file.']);

    $html = Blade::render('<ui:file-upload name="files" />');

    expect($html)
        ->toContain('Please upload at least one file.')
        ->toContain('border-red-500');
});

it('renders file upload with preview slot', function () {
    $html = Blade::render('
        <ui:file-upload name="files">
            <x-slot:preview>
                <div>Existing file preview</div>
            </x-slot:preview>
        </ui:file-upload>
    ');

    expect($html)
        ->toContain('data-file-upload-preview')
        ->toContain('Existing file preview');
});

it('contains upload icon', function () {
    $html = Blade::render('<ui:file-upload name="files" />');

    expect($html)
        ->toContain('<svg') // Icon rendered
        ->toContain('size-8');
});

it('has data-control attribute', function () {
    $html = Blade::render('<ui:file-upload name="files" />');

    expect($html)
        ->toContain('data-control');
});

// =============================================================================
// file-upload.item Component Tests
// =============================================================================

it('renders a file upload item', function () {
    $html = Blade::render('<ui:file-upload.item name="document.pdf" src="/files/document.pdf" />');

    expect($html)
        ->toContain('data-file-upload-item')
        ->toContain('document.pdf');
});

it('renders image preview for image files', function () {
    $html = Blade::render('<ui:file-upload.item name="photo.jpg" src="/images/photo.jpg" />');

    expect($html)
        ->toContain('<img')
        ->toContain('src="/images/photo.jpg"')
        ->toContain('alt="photo.jpg"');
});

it('renders file icon for non-image files', function () {
    $html = Blade::render('<ui:file-upload.item name="document.pdf" src="/files/document.pdf" />');

    expect($html)
        ->toContain('<svg') // Icon rendered
        ->toContain('document.pdf');
});

it('renders correct icon for pdf files', function () {
    $html = Blade::render('<ui:file-upload.item name="document.pdf" src="/files/document.pdf" />');

    expect($html)
        ->toContain('data-file-upload-item');
});

it('renders delete button by default', function () {
    $html = Blade::render('<ui:file-upload.item name="file.pdf" src="/file.pdf" />');

    expect($html)
        ->toContain('button')
        ->toContain('<svg'); // X icon for delete
});

it('hides delete button when deletable is false', function () {
    $html = Blade::render('<ui:file-upload.item name="file.pdf" src="/file.pdf" :deletable="false" />');

    // Count buttons - should only have lightbox button for images, or none for non-images
    // For PDF (non-image), there should be no button at all
    expect($html)
        ->not->toContain('group/delete');
});

it('renders lightbox for images', function () {
    $html = Blade::render('<ui:file-upload.item name="photo.png" src="/photo.png" />');

    expect($html)
        ->toContain('x-teleport="body"')
        ->toContain('lightboxOpen');
});

it('does not render lightbox for non-images', function () {
    $html = Blade::render('<ui:file-upload.item name="doc.pdf" src="/doc.pdf" />');

    expect($html)
        ->not->toContain('x-teleport');
});

it('passes through class attribute to file upload item', function () {
    $html = Blade::render('<ui:file-upload.item name="file.pdf" src="/file.pdf" class="custom-class" />');

    expect($html)
        ->toContain('custom-class');
});

it('passes through data attributes to file upload item', function () {
    $html = Blade::render('<ui:file-upload.item name="file.pdf" src="/file.pdf" data-testid="file-item" data-file-id="123" />');

    expect($html)
        ->toContain('data-testid="file-item"')
        ->toContain('data-file-id="123"');
});

it('detects image type from jpg extension', function () {
    $html = Blade::render('<ui:file-upload.item name="image.jpg" src="/image.jpg" />');
    expect($html)->toContain('<img');
});

it('detects image type from jpeg extension', function () {
    $html = Blade::render('<ui:file-upload.item name="image.jpeg" src="/image.jpeg" />');
    expect($html)->toContain('<img');
});

it('detects image type from png extension', function () {
    $html = Blade::render('<ui:file-upload.item name="image.png" src="/image.png" />');
    expect($html)->toContain('<img');
});

it('detects image type from gif extension', function () {
    $html = Blade::render('<ui:file-upload.item name="image.gif" src="/image.gif" />');
    expect($html)->toContain('<img');
});

it('detects image type from webp extension', function () {
    $html = Blade::render('<ui:file-upload.item name="image.webp" src="/image.webp" />');
    expect($html)->toContain('<img');
});

it('detects image type from svg extension', function () {
    $html = Blade::render('<ui:file-upload.item name="image.svg" src="/image.svg" />');
    expect($html)->toContain('<img');
});

it('detects image type from bmp extension', function () {
    $html = Blade::render('<ui:file-upload.item name="image.bmp" src="/image.bmp" />');
    expect($html)->toContain('<img');
});

it('detects pdf as non-image type', function () {
    $html = Blade::render('<ui:file-upload.item name="file.pdf" src="/file.pdf" />');
    expect($html)->not->toContain('<img src');
});

it('detects doc as non-image type', function () {
    $html = Blade::render('<ui:file-upload.item name="file.doc" src="/file.doc" />');
    expect($html)->not->toContain('<img src');
});

it('detects xls as non-image type', function () {
    $html = Blade::render('<ui:file-upload.item name="file.xls" src="/file.xls" />');
    expect($html)->not->toContain('<img src');
});

it('detects zip as non-image type', function () {
    $html = Blade::render('<ui:file-upload.item name="file.zip" src="/file.zip" />');
    expect($html)->not->toContain('<img src');
});

it('detects mp4 as non-image type', function () {
    $html = Blade::render('<ui:file-upload.item name="file.mp4" src="/file.mp4" />');
    expect($html)->not->toContain('<img src');
});

it('detects mp3 as non-image type', function () {
    $html = Blade::render('<ui:file-upload.item name="file.mp3" src="/file.mp3" />');
    expect($html)->not->toContain('<img src');
});

it('detects txt as non-image type', function () {
    $html = Blade::render('<ui:file-upload.item name="file.txt" src="/file.txt" />');
    expect($html)->not->toContain('<img src');
});

it('allows explicit type override', function () {
    // Even though .pdf extension, force it to render as image
    $html = Blade::render('<ui:file-upload.item name="file.pdf" src="/file.pdf" type="image" />');

    expect($html)
        ->toContain('<img');
});

it('passes wire:click to delete button', function () {
    $html = Blade::render('<ui:file-upload.item name="file.pdf" src="/file.pdf" wire:click="deleteFile(1)" />');

    expect($html)
        ->toContain('wire:click="deleteFile(1)"');
});

it('passes x-on:delete to delete button', function () {
    $html = Blade::render('<ui:file-upload.item name="file.pdf" src="/file.pdf" x-on:delete="removeFile" />');

    expect($html)
        ->toContain('x-on:delete="removeFile"');
});
