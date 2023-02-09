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

<div class="d-flex justify-content-center text-center align-items-center">
    <div class="col-auto">
        <table class="table table-bordered table-responsive mt-5">
            <thead>
                <tr>
                  <th scope="col">Account</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user_data as $data)
                    <tr>
                        <td>{{$data->first_name}} {{$data->last_name}} - {{$data->role->role_name}}</td>

                        <td>
                            <a href="/update-role/{{$data->id}}" class="btn btn-primary">Update Role</a>

                            <br>
                            <br>

                            <form action="/delete/{{$data->id}}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button href="" class="btn btn-primary" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>



@endsection