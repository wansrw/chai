<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Чайная Лавка</title>

    <!-- Стабильный Bootstrap 5.3 (в 6-й версии этих классов нет) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body data-bs-theme="dark" class="d-flex flex-column min-vh-100" style="background-color: #121614; color: #d1d5db; margin: 0;">

    <nav class="navbar navbar-expand-md shadow-sm" style="background-color: #0a0f0d; border-bottom: 1px solid #1f2937;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('index') }}" style="color: #4ade80;">
                <i class="bi bi-cup-hot-fill"></i> Чайная Лавка
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Главная</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('catalog') }}">Каталог</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contacts') }}">Контакты</a></li>

                </ul>
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="text-center py-3 mt-auto" style="background-color: #0a0f0d; border-top: 1px solid #1f2937;">
        <div class="container small" style="color: #6b7280;">
            &copy; {{ date('Y') }} Чайная Лавка. Все права защищены.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
