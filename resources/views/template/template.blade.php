<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>

        @yield('title')
    </title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template_style.css') }}">

    @yield('extra-css')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>

    <header>

        {{-- Judul --}}
        <section class="header-top p-4 d-flex align-items-center justify-content-center">

            <div class="header-title">
                <h1>Amazing E-Grocery</h1>
            </div>



        </section>

        {{-- Navigasi --}}
        <nav class="navbar navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="#">Home</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav mx-5">
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="#">Cart</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav me-5">
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="#">Profile</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="#">Account Maintenance</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <main>

        @yield('content')
    </main>

    <footer class="text-center py-3">

        <p class="mb-0">&copy; Amazing E-Grocery 2023</p>
    </footer>
</body>

</html>
