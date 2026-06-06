<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    // ТОЛЬКО то, что реально вводит пользователь
    protected $fillable = ['body'];

    // При добавлении ответа обновляем updated_at у вопроса
    protected $touches = ['question'];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Scope для сортировки
    public function scopeLatestFirst($query)
    {
        return $query->latest();
    }
}