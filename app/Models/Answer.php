<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //разрешаем записывать текст ответа и айди связей
    protected $fillable = ['question_id', 'user_id'];

//    ответ принадлежит вопросу
    public function question(){
        return
            $this->belongsTo(Question::class);
    }
    public function user(){
        return
            $this->belongsTo(User::class);
    }
}
