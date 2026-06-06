<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question)
    {
        // Валидация с ограничением
        $request->validate([
            'body' => 'required|min:2|max:2000'
        ]);

        // Создаем ответ - user_id берем из авторизации, пока fallback на первого юзера
        $question->answers()->create([
            'body' => $request->body,
            'user_id' => auth()->id() ?? User::first()->id,
        ]);

        return redirect()->back()->with('success', 'Ответ опубликован!');
    }
}
