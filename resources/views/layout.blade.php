<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('style')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <header>
    <nav class='navbar navbar-expand-md navbar-dark bg-dark shadow-sm mb-4'>
      <div class="container">
        <a class="navbar-brand my-navbar-brand" href="{{ route('home') }}">ToDo APP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav"><!-- left Side Of Navbar -->
            <li></li>
          </ul>
          <ul class="navbar-nav ml-auto"><!-- Right Side -->
            @guest
              <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle"
                   role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false"
                   v-pre
                >
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>

        </div>
      </div><!-- container -->
    </nav>
  </header>
  <main>
    @yield('main')
  </main>
  @yield('script')
</body>
</html>
