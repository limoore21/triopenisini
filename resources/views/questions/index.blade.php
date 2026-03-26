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
                <strong>{{ $question->title }}</strong>
                <p>{{ $question->body }}</p>
                <small>Спросил: {{ $question->user->nickname }}</small>

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
