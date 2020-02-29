<div class="article-preview">
  <div class="article-meta">
    <a href="{{ route('profile.show', [$post->author->id]) }}">
      <img src="{{ $post->author->avatar() }}" />
    </a>
    <div class="info">
      <a href="{{ route('profile.show', [$post->author->id]) }}" class="author">{{ $post->author->name }}</a>
      <span class="date">{{ $post->created_at->format('F dS') }}
        @if($post->created_at->year !== now()->year)
          {{ $post->created_at->format('Y') }}
        @endif
      </span>
    </div>

    <button class="btn btn-outline-primary btn-sm pull-xs-right @guest distabled @endguest">
      <i class="ion-heart"></i> {{ $post->likes()->count() }}
    </button>
  </div>
  <a href="{{ route('article.show', [$post->id]) }}" class="preview-link">
    <h1>{{ $post->name }}</h1>
    <p>{{ head(explode("\n", $post->body)) }}</p>
    <span>Read more...</span>
    @if($post->tags)
      <ul class="tag-list">
        @foreach($post->tags as $tag)
          <li class="tag-default tag-pill tag-outline">{{ $tag->name }}</li>
        @endforeach
      </ul>
    @endif
  </a>
</div>