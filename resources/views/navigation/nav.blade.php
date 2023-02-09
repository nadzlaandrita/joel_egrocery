<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ route('item_home_page') }}">Home</a>
                </li>
            </ul>

            <ul class="navbar-nav mx-5">
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ route('cart_page') }}">Cart</a>
                </li>
            </ul>

            <ul class="navbar-nav me-5">
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ route('profile') }}">Profile</a>
                </li>
            </ul>

            @if (Auth::user()->role->role_name == 'admin')
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#">Account Maintenance</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
