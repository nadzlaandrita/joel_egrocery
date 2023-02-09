<div class="text-center">

    @if (Auth::check())
        <a href="{{ route('logout') }}" class="btn btn-warning fw-bold">Logout</a>
    @else
        <a href="{{ route('guest_register') }}" class="btn btn-warning fw-bold">Register</a>
        <a href="{{ route('guest_login') }}" class="btn btn-warning fw-bold mx-3">Login</a>
    @endif
</div>
