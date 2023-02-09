@extends('template.template')

@section('title', 'Home')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/index_guest_style.css') }}">
@endsection

@section('content')
    <section class="main-content d-flex align-items-center justify-content-center">

        <div class="border border-5 border-warning rounded-circle">
            <p class="text-center d-flex justify-content-center align-items-center">Find and Buy Your Grocery Here!</p>
        </div>

    </section>
@endsection
