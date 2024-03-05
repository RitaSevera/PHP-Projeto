<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="{{asset('imagens/music.jpeg')}}" style="height: 30px">
          <a class="navbar-brand" href="{{route('home')}}"> Music </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Bands
                </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('band.add')}}">Create</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{route('band.all')}}">Check</a></li>
            </ul>
            </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Albuns
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('album.add')}}">Create</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('album.all')}}">Check</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  BackOffice
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('dashboard.view')}}">View</a></li>
                </ul>
                <li class="nav-item dropdown">
              @if (Route::has('login'))
              <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                  @auth
                      <a href="{{ url('home') }}" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                    </a>
                    <ul class="dropdown-menu">
                      <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Logout</button>
                    </form>
                  @else
                  <div class="nav">
                      <a href="{{ route('login') }}" class="nav-link">Log in</a>
                      @if (Route::has('user.add'))
                          <a href="{{ route('user.add') }}" class="nav-link">Register</a>
                      @endif
                    </div>
                  @endauth
              </div>
          @endif
          </div>
        </div>
      </nav>

      <div class="container">
        @yield('content')
      <footer class="fixed-bottom">
      </footer>

</body>
</html>
