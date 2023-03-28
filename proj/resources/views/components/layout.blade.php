@props(['title'])

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> {{ $title ?? 'default' }}</title>


    <link href="{{ url('styles.css') }}" rel="stylesheet" />

    {{ $styles ??'' }}

</head>

<body>
    <x-header />

    <main>
        <x-flash-msg />
        
        {{ $slot }}
    </main>
    <x-footer />
</body>

</html>