<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

     # Показывает главную страницу со списком вопросов и юзеров

    public function index()
    {
        // Загружаем вопросы вместе с их авторами, ответами и авторами ответов
// Добавляем подсчет ответов через withCount
        $questions = Question::with(['user', 'answers.user'])
            ->withCount('answers')
            ->latest()
            ->get();
        $users = User::all();

        return view('questions.index', compact('questions', 'users'));
    }


//   Сохраняет новый вопрос в базу

    public function store(Request $request)
    {
        //  Проверяем данные
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        //  Берем первого юзера (пока нет авторизации)
        $user = User::first();

        //  Создаем вопрос через связь
        $user->questions()->create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Вопрос успешно добавлен!');
    }


//     Удаляет вопрос из базы

    public function destroy($id)
    {
        // Находим или выдаем 404 ошибку
        $question = Question::findOrFail($id);

        // Удаляем
        $question->delete();

        return redirect()->back()->with('success', 'Вопрос удален!');
    }
}
