@section('title', 'Контакты')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <article>
                    <h1 class="blog-post-title">Контакты</h1>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                        всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический
                        безорфографичный скатился?</p>
                </article>


                <form action="" method="POST" class="blog-post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>

                        <input type="text" name="email" class="form-control" placeholder="Email" id="email"
                               value="{{ old('email') ?? '' }}">

                        @error('email')
                        <div class="error-form">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Ваша сообщение</label>
                        <textarea class="form-control" id="message" name="message"
                                  placeholder="Ваша сообщение">{{ old('message') ?? '' }}</textarea>
                        @error('message')
                        <div class="error-form">{{ $message }}</div>
                        @enderror
                    </div>

                    @csrf

                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>

            @include('common.column')
        </div>
    </main>
@endsection
