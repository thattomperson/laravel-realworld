<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Conduit</title>
    <!-- Import Ionicon icons & Google Fonts our Bootstrap theme relies on -->
    <link href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Titillium+Web:700|Source+Serif+Pro:400,700|Merriweather+Sans:400,700|Source+Sans+Pro:400,300,600,700,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <!-- Import the custom Bootstrap 4 theme from our hosted CDN -->
    <link rel="stylesheet" href="//demo.productionready.io/main.css">
  </head>
  <body>

    <nav class="navbar navbar-light">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">conduit</a>
        <ul class="nav navbar-nav pull-xs-right">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          @if(Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="{{ route('article.create') }}">
                <i class="ion-compose"></i>&nbsp;New Article
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profile.show', [Auth::user()->id]) }}">
                <img src="{{ Auth::user()->avatar() }}?s=20">&nbsp;{{ Auth::user()->name }}
              </a>
            </li>
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button class="nav-link btn" type="submit">Logout</button>
              </form>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
          @endif
        </ul>
      </div>
    </nav>

    @yield('content')

    <footer>
        <div class="container">
          <a href="/" class="logo-font">conduit</a>
          <span class="attribution">
            An interactive learning project from <a href="https://thinkster.io">Thinkster</a>. Code &amp; design licensed under MIT.
          </span>
        </div>
      </footer>
  
    </body>
  </html>