@extends('template.template')

@section('title', 'profile')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/index_guest_style.css') }}">
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

<div class="d-flex" style=" justify-content: center; align-items: center;">
    <div class="card border-dark mb-3" style="width: 20rem;">

        <div class="card-header">
            <h3>{{$user_data->first_name}} {{$user_data->last_name}}</h3>
        </div>
        <div class="card-body">
            <label for="">Choose the new role</label>
            <form action="/update-role/{{$user_data->id}}" method="POST">
                @method('PATCH')
                @csrf
    
                <select class="form-select" name="role_id" aria-label="Default select example">
                    <option selected></option>
                    @foreach($role_data as $data)
                        <option value="{{$data->id}}">{{$data->role_name}}</option>
                    @endforeach
                </select>
    
                
                <br>
                <br>
                
                <div class="text-center">
                    <input type="submit" value="Save" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection