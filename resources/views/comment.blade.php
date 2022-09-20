<div class="mt-5">
    <div>
        <form method="POST" class="blog-post" action="{{ route('article.comment', $article) }}">
            @csrf

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Комментарий</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default" name="description" placeholder="Ваш комментарий">
                <input type="submit" class="btn btn-secondary" value="Отправить">
            </div>

            @error('description')
            <div class="error-form">
                {{ $message }}
            </div>
            @enderror
        </form>
    </div>

    <div class="text-bg-light">
        @auth
            @forelse($article->comments as $comment)
                <div class="card text-bg-primary mb-3" style="max-width: 100%">
                    <div
                        class="card-header">{{ $comment->user->name }} {{ $comment->created_at->toFormattedDateString() }}</div>
                    <div class="card-body">
                        <p class="card-text">{{ $comment->description }}</p>
                    </div>
                </div>
            @empty
                <b>Комментарии отсутствуют</b>
            @endforelse
        @else
            <b>Авторизуйтесь, чтобы оставить комментарий</b>
        @endauth
    </div>
</div>
