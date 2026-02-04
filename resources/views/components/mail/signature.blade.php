@props([
    'greeting' => 'Met vriendelijke groet,',
    'name' => null,
    'role' => null,
])

<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top: 1px solid #dbdee1;">
    <tr>
        <td style="padding-top: 24px;">
            <p style="font-weight: 600; color: #030304; margin: 0 0 4px;">{{ $greeting }}</p>

            @if($name)
                <p style="font-weight: 600; color: #030304; margin: 0 0 4px;">{{ $name }}</p>
            @endif

            @if($role)
                <p style="color: #5b646d; font-size: 14px; margin: 0;">{{ $role }}</p>
            @endif

            {{ $slot }}
        </td>
    </tr>
</table>
