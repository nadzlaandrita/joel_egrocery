@extends('template.template')

@section('title', 'Saved')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/success_style.css') }}">
@endsection

@section('content')

    <section class="main-content d-flex align-items-center justify-content-center">

        <div
            class="circle d-flex justify-content-center align-items-center border border-5 border-warning rounded-circle text-center">

            <div>
                <p class="title fw-bold">Success</p>

                <p>We will contact you 1x24 hours.</p>

                <p>
                    <a href="{{ route('item_home_page') }}">Click Here to 'Home'</a>
                </p>
            </div>

        </div>

    </section>

@endsection
