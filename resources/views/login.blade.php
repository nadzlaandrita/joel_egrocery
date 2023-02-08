@extends('template.template')

@section('title', 'Login')

@section('content')

    <div class="d-flex justify-content-center align-items-center ">
        <div class="card w-50 shadow" style="">
            <div class="card-body">
                <h1 class="text-center">Login</h1>

                <form method="POST" action="{{ url('/login') }}">
                    @csrf

                    <div class="form-group mb-2">
                        <label class="mb-2">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email"
                            value="{{ Cookie::get('email_cookie') != null ? Cookie::get('email_cookie') : '' }} " required>
                    </div>

                    <div class="form-group mb-2">
                        <label class="mb-2">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember"
                            value="{{ Cookie::get('password_cookie') != null ? Cookie::get('password_cookie') : '' }}">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>

                    <div class="text-center">

                        <button type="submit" class="btn btn-warning mb-3">Sign In</button>

                        <p class="mb-0">Not Registered yet?
                            <a href="/register">Sign Up Here</a>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
