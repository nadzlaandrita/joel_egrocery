@extends('template.template')

@section('title', 'Home')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/index_logged_in_style.css') }}">
@endsection

@section('content')

    <section class="main-content">

        <div class="container">

            <div class="row justify-content-center align-items-center">

                @foreach ($item_data as $data)
                    <div class="col-4 item-card py-2">

                        <img src="https://cdn.icon-icons.com/icons2/3507/PNG/512/carrot_vegetables_vegetable_food_agriculture_icon_220801.png"
                            alt="">

                        <p>{{ $data->item_name }}</p>

                        <a href="{{ route('item_detail_page', $data->id) }}">Detail</a>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="paginate-nav d-flex justify-content-center mt-5">

            {{ $item_data->withQueryString()->links() }}
        </div>
    </section>


@endsection
