<!-- Stored in resources/views/layouts/master.blade.php -->
<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
      <div class="jumbotron">
        @section('navbar')
            <h1 class="display-4">Кинотеатр «Конец Вселенной»</h1>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                    <a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('showtimes.index')}}">Расписание</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('films.index')}}">Фильмы</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('users.show')}}">Личный кабинет</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">О нас</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('contacts')}}">Контакты</a>
                  </li>
                </ul>
              </div>
            </nav>
        @show

        <div class="jumbotron jumbotron-fluid">
          @yield('content')
        </div>
        
      </div>
    </body>
</html>