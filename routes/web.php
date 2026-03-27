<?php

use Illuminate\Support\Facades\Route;
# ОБЯЗАТЕЛЬНО: Импортируем контроллер, чтобы Laravel его "увидел"
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AnswerController;

# Функция при переходе в корень проекта - обязательно!
# Директория в URL адреса. В этом случае если пользователь перейдет в
# корень проекта (https://example.com/) то будет вызываться метод index в QuestionController
#             ⌄⌄⌄⌄⌄
Route::get('/', [QuestionController::class, 'index'])->name('main');
#   ^^^^^^^^^^^^^^^^^^
# Здесь мы связали главную страницу с твоим контроллером, который ты создал.


# Здесь будет вызываться welcome.blade.php из каталога resources/views/welcome.blade.php
#               ⌄⌄⌄⌄⌄
Route::get('/debug', function() {
    # при переходе в каталог debug в url (к примеру https://example.com/debug)
    return view('welcome');
})->name('laravel_welcome');

Route::get('/easter_egg', function() {
    return view('default_easter_egg_lol');
})->name('easter_egg_lol');

# Ресурсный роут для постов (создает сразу index, create, store и т.д.)
Route::resource('posts', PostController::class);

Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');

Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');

Route::post('/questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store');
