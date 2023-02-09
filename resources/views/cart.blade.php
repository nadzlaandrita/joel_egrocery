@extends('template.template')

@section('title', 'Cart')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/cart_style.css') }}">
@endsection

@section('content')

    <section class="main-content container">

        <p class="cart-name fw-bold">
            Cart
        </p>

        @foreach ($order_data as $data)
            <div class="content-box mt-2">

                <div class="row item-box align-items-center text-center">

                    <div class="col-3">

                        <img src="https://cdn.icon-icons.com/icons2/3507/PNG/512/carrot_vegetables_vegetable_food_agriculture_icon_220801.png"
                            alt="">
                    </div>

                    <div class="col-3">

                        <p>{{ $data->item->item_name }}</p>
                    </div>

                    <div class="col-3">

                        <p>{{ $data->price }}</p>
                    </div>

                    <div class="col-3">

                        <form action="{{ route('remove_item_from_cart', $data->item_id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-primary">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </section>

    <section class="container d-flex align-items-center justify-content-end mt-5">

        <p class="fw-bold mb-0 me-3">Total: {{ $totalPrice }}</p>

        <form action="{{ route('checkout_cart') }}" method="POST">

            @csrf
            @method('DELETE')

            <button class="btn btn-warning fw-bold">Check Out</button>
        </form>
    </section>
@endsection
