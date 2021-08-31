<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo App</title>
        <script src="https://kit.fontawesome.com/0f58a2dfa8.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        @livewireStyles
        @livewireScripts 
        <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="container-fluid">
            <a class="navbar-brand" href="/">Todo App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
              <div>
                @guest
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link {{ request()->is('login') ? 'active' : ''}}" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="/register">Register</a>
                    </li>
                  </ul>
                @endguest
                @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item"><a class="nav-link disabled text-light" href="#">You are logged in!</a></li>
                  <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                  </li>
                </ul>
                @endauth
              </div>
            </div>
          </div>
        </nav>
       @yield('content')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
