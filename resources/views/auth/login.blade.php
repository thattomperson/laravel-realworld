@extends('layout')

@section('content')
<div class="auth-page">
    <div class="container page">
      <div class="row">
  
        <div class="col-md-6 offset-md-3 col-xs-12">
          <h1 class="text-xs-center">Login</h1>
          <p class="text-xs-center">
            <a href="/register">Need an account?</a>
          </p>
  
          @if($errors->any())
          <ul class="error-messages">
              @foreach ($errors as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
          @endif

          <form method="POST">
              @csrf
            <fieldset class="form-group">
              <input class="form-control form-control-lg" type="text" placeholder="Email">
            </fieldset>
            <fieldset class="form-group">
              <input class="form-control form-control-lg" type="password" placeholder="Password">
            </fieldset>
            <button type="submit" class="btn btn-lg btn-primary pull-xs-right">
              Login
            </button>
          </form>
        </div>
  
      </div>
    </div>
</div>
@endsection