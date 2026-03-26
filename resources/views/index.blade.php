<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    <title>Триопениси — Главная</title>
</head>
<body>
<header>
    <h1>Триопениси</h1>
    <p>Прив, Тут задают вопросы и получают ответы</p>
    <a href="#">Задать вопрос</a>
</header>

<hr>

<h2>Популярные вопросы:</h2>
{{--Цикл который выводит вопросы из базы--}}
<ul>
    <li><a href="#">Как выучить Laravel за ночь?</a> (Ответов: 12)</li>
    <li><a href="#">Почему Fedora лучше Windows?</a> (Ответов: 5)</li>
</ul>

</body>
</html>


