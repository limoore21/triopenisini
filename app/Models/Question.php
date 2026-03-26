<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model{
    protected $fillable = ['title','body', 'user_id'];

public function user(){
    return
        $this->belongsTo(User::class);
}
public function answers(){
    return
        $this-> hasMany(Answer::class);
}

public function tags(){
    return
        $this-> belongsToMany(Tag::class);
    }
}



