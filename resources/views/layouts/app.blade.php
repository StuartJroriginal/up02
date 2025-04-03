<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Агенство недвижимости')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        footer {
            margin-top: auto;
        }

        /* Скрываем подменю по умолчанию */
        .dropdown-submenu {
            position: relative;
        }

        /* Показываем подменю при наведении */
        .dropdown-submenu:hover .dropdown-menu {
            display: block;
        }

        /* Изначально скрыто */
        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            display: none;
        }
    </style>
</head>

<body>
<body>
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0 text-center">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="{{ asset('logo.png') }}" alt="Логотип" width="auto">
            </a>
        </div>

        <div class="col-md-3 text-end">
        
            <ul class="nav" style="display: flex; justify-content: center; align-items: center;">
                <li><a href="/" class="nav-link px-2 link-secondary">Главная</a></li>    
                @auth
                    
                    @if(Auth::user()->id_role == 1)
                    <a href="{{ route('admin.users') }}" class="btn btn-outline-primary">Пользователи</a>
                    <a href="{{ route('admin.schedule') }}" class="btn btn-outline-primary">Расписание смен</a>
                    <a href="{{ route('admin.documents') }}" class="btn btn-outline-primary">Документы клиетов</a>
                    @elseif(Auth::user()->id_role == 2)
                        
                    @elseif(Auth::user()->id_role == 3)
                        
                    @endif

                @endauth
            </ul>
        
        </div>

        <div class="col-md-3 text-end">
        
            <ul class="nav" style="display: flex; justify-content: center; align-items: center;">
                
                @auth
                    <a href="/logout" class="btn btn-outline-primary me-2">Выйти</a>
                    
                    @if(Auth::user()->id_role == 1)
                        <p class="link-secondary me-2 mb-0">Вы авторизованы как админ</p>
                    @elseif(Auth::user()->id_role == 2)
                        <p class="link-secondary me-2 mb-0">Вы авторизованы как юрист</p>
                    @elseif(Auth::user()->id_role == 3)
                        <p class="link-secondary me-2 mb-0">Вы авторизованы как риелтор</p>
                    @endif

                @else
                    <a href="/login" class="btn btn-outline-primary me-2">Войти</a>
                @endauth
            </ul>
        
        </div>
    </header>
</body>

    <main class="container d-flex flex-column">
        @yield('content')

        <footer class="py-2 my-2">
            <p class="text-center text-body-secondary">© 2025 Агенство недвижимости</p>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
