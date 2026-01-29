@props([
    'title' => null,
    'description' => null,
    'buttonUrl' => '#',
    'buttonText' => 'Aan de slag',
    'backgroundColor' => '#e8f4ff',
    'primaryColor' => '#2b7fff',
])

<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom: 40px;">
    <tr>
        <td align="center" style="background-color: {{ $backgroundColor }}; border-radius: 8px; padding: 32px;">
            @if($title)
                <h3 style="font-size: 20px; font-weight: 600; color: #030304; margin: 0 0 12px;">{{ $title }}</h3>
            @endif

            @if($description)
                <p style="color: #42494f; font-size: 15px; margin: 0 0 24px;">{{ $description }}</p>
            @endif

            {{ $slot }}

            <!--[if mso]>
            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ $buttonUrl }}" style="height:48px;v-text-anchor:middle;width:250px;" arcsize="17%" strokecolor="{{ $primaryColor }}" fillcolor="{{ $primaryColor }}">
                <w:anchorlock/>
                <center style="color:#ffffff;font-family:sans-serif;font-size:16px;font-weight:bold;">{{ $buttonText }}</center>
            </v:roundrect>
            <![endif]-->
            <!--[if !mso]><!-->
            <a href="{{ $buttonUrl }}" class="button" style="display: inline-block; background-color: {{ $primaryColor }}; color: #ffffff !important; font-size: 16px; font-weight: 600; text-decoration: none; padding: 14px 32px; border-radius: 8px;">{{ $buttonText }}</a>
            <!--<![endif]-->
        </td>
    </tr>
</table>
