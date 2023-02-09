@extends('template.template')

@section('title', 'Cart')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/cart_style.css') }}">
@endsection

@section('header-links')

    <div class="text-center">

        @if (Auth::check())
            <a href="" class="btn btn-warning fw-bold">Logout</a>
        @else
            <a href="{{ route('guest_register') }}" class="btn btn-warning fw-bold">Register</a>
            <a href="{{ route('guest_login') }}" class="btn btn-warning fw-bold mx-3">Login</a>
        @endif
    </div>

@endsection

@section('content')

    <section class="main-content container">

        <p class="cart-name fw-bold">
            Cart
        </p>

        <div class="content-box mt-2">

            <div class="row item-box align-items-center text-center">

                <div class="col-3">

                    <img src="https://cdn.icon-icons.com/icons2/3507/PNG/512/carrot_vegetables_vegetable_food_agriculture_icon_220801.png"
                        alt="">
                </div>

                <div class="col-3">

                    <p>Nama Sayur</p>
                </div>

                <div class="col-3">

                    <p>Nama Sayur</p>
                </div>

                <div class="col-3">

                    <form action="">

                        <button class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="container d-flex align-items-center justify-content-end">

        <p class="fw-bold mb-0">Total: </p>

        <form action="">

            <button class="btn btn-warning fw-bold">Check Out</button>
        </form>
    </section>
@endsection
