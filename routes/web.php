<?php

use Illuminate\Support\Facades\Route;

# Функция при переходе в корень проекта - обязательно!
# Директория в URL адреса. В этом случае если пользователь перейдет в
# корень проекта (https://example.com/) то будет вызываться вьюшка main_page
#             ⌄⌄⌄⌄⌄
Route::get('/', function () {
    # Здесь берем название файла из resources/views/{имя}.blade.php
    return view('main_page');
})->name('main');
#   ^^^^^^^^^^^^^^^^^^
# Здесь опционально задаем псевдоним для нашего файла к которому будем обращаться
# в файлах .blade.php для перехода через {{ route(name) }}


# Здесь будет вызываться welcome.blade.php из каталога resources/views/welcome.blade.php
#               ⌄⌄⌄⌄⌄
Route::get('/debug', function() {
    # при переходе в каталог debug в url (к примеру https://example.com/debug)
    return view('welcome');
})->name('laravel_welcome');

Route::get('/easter_egg', function() {
    return view('default_easter_egg_lol');
})->name('easter_egg_lol');

Route::get('/', function () {
    return view('index'); #resources/views/index.blade.php
});
