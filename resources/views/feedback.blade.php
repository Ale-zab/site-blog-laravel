@section('title', 'Сообщения')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-12">
                <article>
                    <h1 class="blog-post-title">Сообщения</h1>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                        всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический
                        безорфографичный скатился?</p>
                </article>

                <table class="blog-post" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Email</th>
                        <th>Сообщение</th>
                        <th>Дата получения</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if ($messages->count())
                        @foreach($messages as $message)
                            <tr>
                                <td>{{$message->email}}</td>
                                <td>{{$message->message}}</td>
                                <td>{{$message->created_at->format('H:m:s d.m.Y')}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">Сообщения отсутствуют</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
