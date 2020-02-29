@extends('layout')

@section('content')
<div class="auth-page">
    <div class="container page">
      <div class="row">
  
        <div class="col-md-6 offset-md-3 col-xs-12">
          <h1 class="text-xs-center">Register</h1>
          <p class="text-xs-center">
            <a href="/login">Have an account?</a>
          </p>
  
          @if($errors->any())
          <ul class="error-messages">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
          @endif
  
          <form method="POST">
            @csrf
            <fieldset class="form-group">
              <input name="name" class="form-control form-control-lg" type="text" placeholder="Your Name">
            </fieldset>
            <fieldset class="form-group">
              <input name="email" class="form-control form-control-lg" type="text" placeholder="Email">
            </fieldset>
            <fieldset class="form-group">
              <input name="password" class="form-control form-control-lg" type="password" placeholder="Password">
            </fieldset>
            <fieldset class="form-group">
                <input name="password_confirmation" class="form-control form-control-lg" type="password" placeholder="Password">
            </fieldset>
            <button type="submit" dusk="submit-button" class="btn btn-lg btn-primary pull-xs-right">
              Register
            </button>
          </form>
        </div>
  
      </div>
    </div>
</div>
@endsection