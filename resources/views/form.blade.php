<p><b>* — Поля обязательные для заполнения</b></p>
@csrf

@if (isset($article->id))
    <input type="hidden" name="id" value="{{ $article->id }}">
@endif

<div class="mb-3">
    <label for="name" class="form-label">Название *</label>

    @if (isset($article->name))
        <input type="text" name="name" class="form-control" placeholder="Название" id="name"
               value="{{ old('name', $article->name) }}">
    @else
        <input type="text" name="name" class="form-control" placeholder="Название" id="name" value="{{ old('name') }}">
    @endif

    @error('name')
    <div class="error-form">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="url" class="form-label">Адрес статьи *</label>

    @if (isset($article->url))
        <input type="text" name="url" class="form-control" placeholder="Адрес статьи" id="url"
               value="{{ old('url', $article->url) }}">
    @else
        <input type="text" name="url" class="form-control" placeholder="Адрес статьи" id="url" value="{{ old('url') }}">
    @endif

    @error('url')
    <div class="error-form">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="short_description" class="form-label">Краткое описание *</label>

    @if (isset($article->short_description))
        <textarea class="form-control" id="short_description" name="short_description"
                  placeholder="Краткое описание">{{ old('short_description', $article->short_description) }}</textarea>
    @else
        <textarea class="form-control" id="short_description" name="short_description"
                  placeholder="Краткое описание">{{ old('short_description') }}</textarea>
    @endif

    @error('short_description')
    <div class="error-form">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Статья *</label>

    @if (isset($article->description))
        <textarea class="form-control" id="description" name="description"
                  placeholder="Статья">{{ old('description', $article->description) }}</textarea>
    @else
        <textarea class="form-control" id="description" name="description"
                  placeholder="Статья">{{ old('description') }}</textarea>
    @endif

    @error('description')
    <div class="error-form">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="tags" class="form-label">Теги</label>

    @if (isset($article->description))
        <input type="text" name="tags" class="form-control" placeholder="Теги" id="tags"
               value="{{ old('tags', $article->tags->pluck('name')->implode(',')) }}">
    @else
        <input type="text" name="tags" class="form-control" placeholder="Теги" id="tags" value="{{ old('tags') }}">
    @endif
</div>

<div class="mb-3 form-check">
    @if (isset($article->status))
        @if ($article->status)
            <input type="checkbox" class="form-check-input" id="status" name="status" checked="checked">
        @else
            <input type="checkbox" class="form-check-input" id="status" name="status">
        @endif
    @else
        <input type="checkbox" class="form-check-input" id="status" name="status">
    @endif
    <label class="form-check-label" for="status">Вкл/ Выкл</label>
</div>

<button type="submit" class="btn btn-primary">Отправить</button>
