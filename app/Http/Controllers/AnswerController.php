<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request, $questionId)
    {
        //Валидация
        $request->validate([
            'body' => 'required|min:2'
        ]);

        //Находим вопрос к которому пишем ответ
        $question = Question::findOrFail($questionId);

        //Создаем ответ (пока привязываем к первому юзеру, как и раньше)
        $question->answers()->create([
            'body' => $request->body,
            'user_id' => User::first()->id,
        ]);

        return redirect()->back()->with('success', 'Ответ опубликован!');
    }
}
