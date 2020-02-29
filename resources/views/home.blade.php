@extends('layout')

@section('content')
<div class="home-page">
  <div class="banner">
    <div class="container">
      <h1 class="logo-font">conduit</h1>
      <p>A place to share your knowledge.</p>
    </div>
  </div>

  <div class="container page">
    <div class="row">
      <div class="col-md-9">
        <div class="feed-toggle">
          <ul class="nav nav-pills outline-active">
            @auth
            <li class="nav-item">
              <a class="nav-link {{ $page == 'feed' ? 'active' : '' }}" href="{{ route('home.feed') }}">Your Feed</a>
            </li>
            @endauth
            <li class="nav-item">
              <a class="nav-link {{ $page == 'global' ? 'active' : '' }}" href="{{ route('home.global') }}">Global Feed</a>
            </li>
            @if(isset($tag))
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('home.tag', [$tag->id]) }}">{{ $tag->name }}</a>
              </li>
            @endif
          </ul>
        </div>
        
        @forelse($articles as $article)
          @include('partial.article', ['article' => $article])
        @empty
          <h2>There are no articles here</h2>
          @if($page == 'feed')
          <h3>Try following some authors or liking some articles</h3>
          @endif
        @endforelse

        {{ $articles }}
      </div>

      <div class="col-md-3">
        <div class="sidebar">
        <p>Popular Tags</p>
        <div class="tag-list">
          @foreach($tags as $tag)
            <a href="{{ route('home.tag', [$tag->id]) }}" class="tag-pill tag-default">{{ $tag->name }}</a>
          @endforeach
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection