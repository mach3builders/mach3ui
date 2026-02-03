@props([
    'primaryColor' => '#2b7fff',
    'primaryColorDark' => '#1447e6',
    'subtitle' => null,
    'title' => null,
])

<tr>
    <td align="center" class="content-padding"
        style="background: linear-gradient(135deg, {{ $primaryColor }} 0%, {{ $primaryColorDark }} 100%); padding: 0 40px 60px;">
        @if ($title)
            <h1 class="hero-title"
                style="color: #ffffff; font-size: 32px; font-weight: 700; margin: 0 0 16px; line-height: 1.2;">
                {{ $title }}</h1>
        @endif

        @if ($subtitle)
            <p class="hero-subtitle"
                style="color: rgba(255, 255, 255, 0.9); font-size: 18px; margin: 0; max-width: 480px;">
                {{ $subtitle }}</p>
        @endif

        {{ $slot }}
    </td>
</tr>
