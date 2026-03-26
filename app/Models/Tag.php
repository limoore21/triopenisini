<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //разрешаем записывать только имя тега
    protected $fillable = ['name'];
//    тег может быть у многих вопросов
    public function questions(){
        return
            $this->belongsToMany(Question::class);
    }
}


//Что дают на практике на первый взгляд эти пустые модели:
//В контроллере: $question = Question::with(['answer','tags'])->first(1);
//В шаблоне (.blade.php):
//Вывести все теги:
//@foreach($question->tags as $tag) #{{ $tag->name }} @endforeach
//Вывести все ответы:
//@foreach($question -> answers as $answer) {{$answer -> body}} @endforeach

