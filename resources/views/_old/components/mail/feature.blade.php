@props([
    'description' => null,
    'icon' => null,
    'primaryColor' => '#2b7fff',
    'title' => null,
])

<table role="presentation" class="feature-table" width="100%" cellspacing="0" cellpadding="0" border="0"
    style="margin-bottom: 20px;">
    <tr>
        <td class="feature-icon-cell" width="64" valign="top" style="padding-right: 16px;">
            <table role="presentation" width="48" height="48" cellspacing="0" cellpadding="0" border="0"
                style="background-color: #e8f1ff; border-radius: 8px;">
                <tr>
                    <td align="center" valign="middle">
                        @if ($icon)
                            <img src="{{ $icon }}" alt="" style="width: 24px; height: 24px;">
                        @else
                            <span style="font-size: 20px;">💡</span>
                        @endif
                    </td>
                </tr>
            </table>
        </td>

        <td class="feature-content-cell" valign="top">
            @if ($title)
                <h4 style="font-size: 16px; font-weight: 600; color: #030304; margin: 0 0 4px;">{{ $title }}</h4>
            @endif

            @if ($description)
                <p style="color: #5b646d; font-size: 14px; line-height: 1.5; margin: 0;">{{ $description }}</p>
            @endif

            {{ $slot }}
        </td>
    </tr>
</table>
