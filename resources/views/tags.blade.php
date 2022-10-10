@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    <div>
        @foreach($tags as $tag)
            <a href="/tags/{{$tag->name}}" class="mb-1 btn btn-secondary btn-sm active" role="button"
               aria-pressed="true">{{$tag->name}}</a>
        @endforeach
    </div>
@endif
