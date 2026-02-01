@props([
    'description' => null,
    'image' => null,
    'linkText' => 'Lees meer',
    'linkUrl' => null,
    'primaryColor' => '#2b7fff',
    'title' => null,
])

<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0"
    style="background-color: #edeff1; border-radius: 8px; overflow: hidden; border: 1px solid #dbdee1; margin-bottom: 20px;">
    @if ($image)
        <tr>
            <td>
                <img src="{{ $image }}" alt="{{ $title ?? 'Afbeelding' }}" class="card-image"
                    style="width: 100%; height: 180px; object-fit: cover; display: block;">
            </td>
        </tr>
    @endif

    <tr>
        <td style="padding: 24px;">
            @if ($title)
                <h4 style="font-size: 18px; font-weight: 600; color: #030304; margin: 0 0 8px;">{{ $title }}</h4>
            @endif

            @if ($description)
                <p style="color: #5b646d; font-size: 15px; line-height: 1.6; margin: 0 0 16px;">{{ $description }}</p>
            @endif

            {{ $slot }}

            @if ($linkUrl)
                <a href="{{ $linkUrl }}"
                    style="color: {{ $primaryColor }}; font-size: 14px; font-weight: 500; text-decoration: none;">{{ $linkText }}
                    →</a>
            @endif
        </td>
    </tr>
</table>
