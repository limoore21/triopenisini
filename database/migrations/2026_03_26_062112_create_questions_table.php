<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions',
            function (Blueprint $table) {
            $table->id();
            $table->string('title'); #Заголовок вопроса
                $table->text('content'); #Описание вопроса
                $table -> foreignId('user_id')->constrained()->cascadeOnDelete();#связываем вопрос с пользователем
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
