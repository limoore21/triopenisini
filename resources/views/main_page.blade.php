<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   {{-- Подключение стилей через vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body class="font-serif antialiased">
    <h1 class="text-4xl font-bold mb-4">Здарова ларавел fdfs </h1>
    <a href="{{ route('laravel_welcome') }}">Перейти на привествие Laravel</a>
</body>
</html>
