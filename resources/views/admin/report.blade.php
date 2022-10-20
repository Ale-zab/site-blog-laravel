@section('title', 'Админ. раздел')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-12">
                <article>
                    <h1 class="blog-post-title">Отчет</h1>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                        всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический
                        безорфографичный скатился?</p>
                </article>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="/admin/report" method="POST">
                    <div class="row">
                        @csrf
                        <div class="form-check">
                            <input class="form-check-input" name="report[]" type="checkbox" value="comment"
                                   id="comment">
                            <label class="form-check-label" for="comment">
                                Комментарии
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" name="report[]" type="checkbox" value="tag" id="tag">
                            <label class="form-check-label" for="tag">
                                Теги
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" name="report[]" type="checkbox" value="article"
                                   id="article">
                            <label class="form-check-label" for="article">
                                Статьи
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" name="report[]" type="checkbox" value="user" id="user">
                            <label class="form-check-label" for="user">
                                Пользователи
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" name="report[]" type="checkbox" value="news" id="news">
                            <label class="form-check-label" for="news">
                                Новости
                            </label>
                        </div>
                    </div>

                    @error('report')
                    <div class="error-form">
                        {{ $message }}
                    </div>
                    @enderror

                    <button type="submit" class="btn btn-primary mt-4">Сгенерировать отчёт</button>
                </form>

            </div>
        </div>
    </main>
@endsection
