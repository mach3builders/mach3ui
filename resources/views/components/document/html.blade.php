<html lang="{{ str_replace('_', '-', strtolower(app()->getLocale())) }}" class="h-full min-h-screen">
    {{ $slot }}
</html>
