<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? 'Selective Finance' }}</title>
    <meta name="description" content="{{ $description ?? '' }}">
    @vite('resources/css/app.css')
</head>

<body class="antialiased font-sans">
    {{ $slot }}
</body>

</html>