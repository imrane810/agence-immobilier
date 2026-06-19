<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Agence Immobilière')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="/">
                Agence Immo
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Accueil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Biens</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

                <ul class="navbar-nav">

                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Connexion
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            Inscription
                        </a>
                    </li>
                    @endguest

                    @auth
                    <li class="nav-item">
                        <span class="nav-link">
                            {{ auth()->user()->name }}
                        </span>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm mt-1">
                                Logout
                            </button>
                        </form>
                    </li>
                    @endauth

                </ul>

            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">
            © {{ date('Y') }} Agence Immobilière
        </p>
    </footer>

</body>

</html>