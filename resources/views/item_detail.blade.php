@extends('template.template')

@section('title', 'Item ' . $item_data->id)

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/item_detail_style.css') }}">
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

        <p class="item-name fw-bold">
            {{ $item_data->item_name }}
        </p>

        <div class="content-box">

            <div class="row align-items-center">

                <div class="col-4 content-left">

                    <img src="https://cdn.icon-icons.com/icons2/3507/PNG/512/carrot_vegetables_vegetable_food_agriculture_icon_220801.png"
                        alt="">
                </div>

                <div class="col-8 content-right">

                    <p class="fw-bold">{{ 'Price: Rp. ' . $item_data->price }}</p>

                    <p>{{ $item_data->item_desc }}</p>
                </div>
            </div>
        </div>

        <div class="content-button text-end">

            <form action="{{ route('add_item_to_cart', $item_data->id) }}" method="POST">
                @csrf

                <button class="btn btn-warning fw-bold">Buy</button>
            </form>
        </div>

    </section>
@endsection
