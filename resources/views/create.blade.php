@section('title', 'Создать статью')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <article>
                    <h1 class="blog-post-title">Создать статью</h1>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                        всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический
                        безорфографичный скатился?</p>
                </article>

                <form action="/articles" method="POST" class="blog-post">
                    @include('form')
                </form>
            </div>

            @include('common.column')
        </div>
    </main>
@endsection

