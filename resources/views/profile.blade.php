@extends('layout')

@section('content')
<div class="profile-page">
  <div class="user-info">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-10 offset-md-1">
          <img src="{{ $user->avatar() }}?s=100" class="user-img" />
          <h4>{{ $user->name }}</h4>
          <p>{{ $user->bio }}</p>
          <button class="btn btn-sm btn-outline-secondary action-btn">
            <i class="ion-plus-round"></i>
            &nbsp;
            Follow {{ $user->name }}
          </button>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-10 offset-md-1">
        <div class="articles-toggle">
          <ul class="nav nav-pills outline-active">
            <li class="nav-item">
              <a class="nav-link @if(!request()->has('favourites')) active @endif" href="{{ route('profile.show', [$user->id]) }}">My Articles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if(request()->has('favourites')) active @endif" href="{{ route('profile.show', [$user->id]) }}?favourites">Favorited Articles</a>
            </li>
          </ul>
        </div>

        @forelse($posts as $post)
          @include('partial.article', ['post' => $post])
        @empty
          <h2>No posts here</h2>
        @endforelse


      </div>

    </div>
  </div>

</div>
@endsection