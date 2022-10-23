@section('title', 'Новости')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-12">
                <div class="row justify-content-between">
                    <article class="col-8">
                        <h1 class="blog-post-title">Новости</h1>
                        <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                            всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь
                            реторический
                            безорфографичный скатился?</p>
                    </article>
                    <div class="col-4 d-flex align-self-start justify-content-end">
                        <a type="button" href="/admin/news/create" class="btn  col-3 btn-primary">Создать</a>
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

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

                    @forelse ($news as $item)
                        <tr>
                            <td>
                                <a class="link-dark" href="/admin/news/{{$item->url}}/edit">{{$item->name}}</a>

                            </td>
                            <td>
                                <a class="link-dark" href="/admin/news/{{$item->url}}/edit">
                                    @if ($item->status)
                                        Опубликован
                                    @else
                                        Скрыт
                                    @endif
                                </a>
                            </td>
                            <td>
                                <a class="link-dark" href="/admin/news/{{$item->url}}/edit">
                                    @datetime($item->created_at)
                                </a>
                            </td>
                            <td>
                                <a class="link-dark" href="/admin/news/{{$item->url}}/edit">
                                    @datetime($item->updated_at)
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Новости отсутствуют</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>

                {{ $news->links() }}
            </div>
        </div>
    </main>
@endsection
