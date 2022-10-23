@section('title', 'Создать новость')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-12">
                <article>
                    <h1 class="blog-post-title">Создать новость</h1>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                        всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический
                        безорфографичный скатился?</p>
                </article>

                <form action="/admin/news/create" method="POST" class="blog-post">
                    @include('admin.news.layouts.form')
                </form>
            </div>
        </div>
    </main>
@endsection

