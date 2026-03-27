<style>
    .container { display: flex; gap: 20px; }
    .main-content { flex: 2; }
    .sidebar { flex: 1; background: #f4f4f4; padding: 15px; border-radius: 5px; }

    .btn-delete { background: #fff0f0; color: #b91c1c; border: 1px solid #fecaca; padding: 4px 12px; font-size: 12px; border-radius: 4px; cursor: pointer; transition: all 0.2s; }
    .btn-delete:hover {background: #fecaca; color: #991b1b;}

    .form-box { background: #fff; padding: 20px; border: 1px dashed #666; margin-bottom: 20px; border-radius: 8px; }
    .input-field { width: 100%; padding: 8px; margin-bottom: 10px; display: block; }
    .btn-submit { background: #28a745; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 4px; }

    .question-card { border: 1px solid #666; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
    .alert-success { background: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 5px; }

    .answers-section { margin-left: 30px;margin-top: 15px;padding-left: 15px;border-left: 2px solid #eee; }
    .answer-item { background: #fafafa;padding: 8px;margin-bottom: 8px;border-radius: 4px;border: 1px solid #eee; }
    .answer-item p { margin: 0;font-size: 14px; }
    .answer-item small { color: #888; }
    .answer-form { margin-top: 10px;display: flex;gap: 10px; }
    .answer-input { flex: 1;padding: 6px 10px;border: 1px solid #ccc;border-radius: 4px; }
    .btn-answer { background: #007bff; color: white; border: none; padding: 5px 15px; border-radius: 4px; cursor: pointer; font-size: 13px; transition: background 0.2s;}
    .btn-answer:hover { background: #0056b3; }
    .answer-count { background: #e9ecef; color: #495057; font-size: 11px; padding: 3px 10px; border-radius: 12px; margin-left: 8px; font-weight: 500; vertical-align: middle; display: inline-flex; align-items: center; gap: 4px; }
</style>

<div class="container">

    <div class="main-content">
        <div class="form-box">
            <h3>Задать новый вопрос</h3>
{{--Код внутри сработает только в том случае если в сессии лежит сообщение об успехе
 Если его нет то этот кусок html вообще не попадет в браузер--}}
            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('questions.store') }}" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Заголовок" class="input-field" required>
                <textarea name="body" placeholder="Текст вопроса" rows="4" class="input-field" required></textarea>
                <button type="submit" class="btn-submit">Опубликовать</button>
            </form>
        </div>

        <h2>Лента вопросов</h2>
        @forelse($questions as $question)
            <div class="question-card">
                <strong>
                    {{ $question->title }}
                    <span class="answer-count">
            💬           Ответов: {{ $question->answers_count }}
                    </span>
                </strong>
{{--                <strong>{{ $question->title }}</strong>--}}
                <p>{{ $question->body }}</p>
                <small>Спросил: {{ $question->user->nickname }}</small>

                <div class="answers-section">
                    @foreach($question->answers as $answer)
                        <div class="answer-item">
                            <p>{{ $answer->body }}</p>
                            <small>— {{ $answer->user->nickname }}</small>
                        </div>
                    @endforeach

                    <form action="{{ route('answers.store', $question->id) }}" method="POST" class="answer-form">
                        @csrf
                        <input type="text" name="body" placeholder="Написать ответ..." class="answer-input" required>
                        <button type="submit" class="btn-answer">Ответить</button>
                    </form>
                </div>

                <hr> <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="margin-top: 10px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete" onclick="return confirm('Удалить этот вопрос?')">
                        Удалить
                    </button>
                </form>
            </div>
        @empty
            <p>Вопросов пока мало</p>
        @endforelse
    </div>

    <div class="sidebar">
        <h3>Наши пользователи ({{ $users->count() }})</h3>
        <ul>
            @foreach($users as $user)
                <li>
                    <strong>{{ $user->nickname }}</strong>
                    <br><small>{{ $user->email }}</small>
                </li>
            @endforeach
        </ul>
    </div>

</div>


{{-- @forelse($questions as $question)
            <div class="question-card">
                <strong>{{ $question->title }}</strong>
                <p>{{ $question->body }}</p>
                <small>Спросил: {{ $question->user->nickname }}</small>
            </div>
 Это умный цикл
Сначала он пытается перебрать список вопросов $questions
Если список пуст он автоматически перескакивает в блок @empty и выводит надпись «Вопросов пока мало»--}}
{{--{{ $variable }}
Это способ вывести данные
{{ session('success') }} — выводит текст сообщения
{{ $question->title }} — выводит заголовок вопроса
{{ $user->nickname }} — выводит никнейм--}}

{{--@csrf эта штука обязательна во вьшках, без нее ларавел не видет верстку--}}
