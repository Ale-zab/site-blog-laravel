@section('title', 'Сообщения')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-12">
                <article>
                    <h1 class="blog-post-title">Статьи</h1>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                        всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический
                        безорфографичный скатился?</p>
                </article>

                <table class="table" style="width: 100%">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Название</th>
                        <th scope="col">Стастус</th>
                        <th scope="col">Дата создания</th>
                        <th scope="col">Дата изменения</th>
                    </tr>
                    </thead>

                    <tbody>

                    @forelse ($articles as $article)
                        <tr>
                            <td>
                                <a class="link-dark" href="/admin/articles/{{$article->url}}/edit">{{$article->name}}</a>

                            </td>
                            <td>
                                <a class="link-dark" href="/admin/articles/{{$article->url}}/edit">
                                    @if ($article->status)
                                        Опубликован
                                    @else
                                        Скрыт
                                    @endif
                                </a>
                            </td>
                            <td>
                                <a class="link-dark" href="/admin/articles/{{$article->url}}/edit">
                                    @datetime($article->created_at)
                                </a>
                            </td>
                            <td>
                                <a class="link-dark" href="/admin/articles/{{$article->url}}/edit">
                                    @datetime($article->updated_at)
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Статьи отсутствуют</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
