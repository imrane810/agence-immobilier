<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>
        @yield('title', 'Administration')
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid">

        <div class="row">

            {{-- Sidebar --}}
            <div class="col-md-2 p-0">
                @include('components.sidebar')
            </div>

            {{-- Content --}}
            <div class="col-md-10 p-0">

                @include('components.navbar')

                <main class="p-4">

                    @yield('content')

                </main>

            </div>

        </div>

    </div>

</body>

</html>