<div class="article-preview">
  <div class="article-meta">
    <a href="{{ route('profile.show', [$article->author->id]) }}">
      <img src="{{ $article->author->avatar() }}" />
    </a>
    <div class="info">
      <a href="{{ route('profile.show', [$article->author->id]) }}" class="author">{{ $article->author->name }}</a>
      <span class="date">{{ $article->created_at->format('F dS') }}
        @if($article->created_at->year !== now()->year)
          {{ $article->created_at->format('Y') }}
        @endif
      </span>
    </div>

    <form method="POST" action="{{ route('article.like', [$article->id]) }}">
      @csrf
      <button type="submit" class="btn btn-outline-primary btn-sm pull-xs-right @guest disabled @endguest">
        <i class="ion-heart"></i> {{ $article->likes_count }}
      </button>
    </form>
  </div>
  <a href="{{ route('article.show', [$article->id]) }}" class="preview-link">
    <h1>{{ $article->name }}</h1>
    <p>{{ head(explode("\n", $article->body)) }}</p>
    <span>Read more...</span>
    @if($article->tags)
      <ul class="tag-list">
        @foreach($article->tags as $tag)
          <li class="tag-default tag-pill tag-outline">{{ $tag->name }}</li>
        @endforeach
      </ul>
    @endif
  </a>
</div>