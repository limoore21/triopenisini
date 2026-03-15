<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <div class="flex flex-col items-center justify-center gap-2">
        <h1 class="text-4xl font-bold mb4"> You found super-duper-best meme ever!</h1>
        <img
            src="{{ asset('gifs/monkey.gif') }}"
            alt="Memememememememe :))))))">
        <p class="text-2xl font-bold"> We programming this website</p>
    </div>
</body>
</html>
