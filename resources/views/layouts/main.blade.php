<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/nicEdit.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</head>

<body>
<div class="container">
    <header class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'index' ? 'active' : '' }}" href="{{ route('index') }}">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'info' ? 'active' : '' }}" href="{{ route('info') }}">Информация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::getCurrentRoute()->getPath() == 'home/add' || Route::getCurrentRoute()->getPath() == 'home/edit' || Route::getCurrentRoute()->getPath() == 'home/edit/{id}' ? 'active' : '' }}" href="{{ route('home') }}">Админ панель</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted"><a href="{{ route('index') }}">Blog</a></h3>
    </header>

    @yield('content')

    <footer class="footer">
        <hr>
        <p>Блог | <a href="mailto:stas.evgen9@gmail.com">stas.evgen9@gmail.com</a> &copy; 2017</p>
    </footer>

</div> <!-- /container -->
</body>
</html>
