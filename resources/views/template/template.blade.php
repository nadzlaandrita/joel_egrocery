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
        <section class="bg-success p-4 d-flex align-items-center justify-content-center">

            <div class="container">

                <div class="row justify-content-center align-items-center">

                    <div class="col-8 header-title text-end">
                        <h1>

                            @if (Auth::check())
                                <a href="{{ route('item_home_page') }}">Amazing E-Grocery</a>
                            @else
                                <a href="{{ route('guest_home') }}">Amazing E-Grocery</a>
                            @endif

                        </h1>
                    </div>

                    <div class="col-4 header-links">

                        @include('navigation.header-links')
                    </div>
                </div>
            </div>
        </section>

        {{-- Navigasi --}}
        @if (Auth::check())
            @include('navigation.nav')
        @endif

    </header>

    <main class="my-5">

        @yield('content')
    </main>

    {{-- <footer class="text-center py-3 bg-success">

        <div>
            <p class="mb-0">&copy; Amazing E-Grocery 2023</p>
        </div>
    </footer> --}}
</body>

</html>
