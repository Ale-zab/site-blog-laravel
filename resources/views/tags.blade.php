@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    <div>
        @foreach($tags as $tag)
            <a href="/articles/tags/{{$tag->name}}" class="mb-1 btn btn-secondary btn-sm active" role="button"
               aria-pressed="true">{{$tag->name}}</a>
        @endforeach
    </div>
@else
    <p>Теги не найдены</p>
@endif
