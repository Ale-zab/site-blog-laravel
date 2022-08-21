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

                <table class="table" style="width: 100%">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Сообщение</th>
                        <th scope="col">Дата получения</th>
                    </tr>
                    </thead>

                    <tbody>

                    @forelse($messages as $message)
                        <tr>
                            <td class="link-dark">{{$message->email}}</td>
                            <td class="link-dark">{{$message->message}}</td>
                            <td class="link-dark">@datetime($message->created_at)</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Сообщения отсутствуют</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
