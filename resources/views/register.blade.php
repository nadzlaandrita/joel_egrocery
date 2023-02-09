@extends('template.template')

@section('title', 'Register')

@section('content')

    <div class="mt-5 me-2 d-flex justify-content-center align-items-center">
        <div class="card w-50 shadow" style="">
            <div class="card-body">
                <h1 class="text-center">Register</h1>

                <form action={{ url('/register') }} method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group mb-2">
                        <label class="mb-2" for="first_name">First Name</label>

                        <input type="text" name="first_name" id="first_name" class="form-control"
                            placeholder="(5-20 letters)" required autofocus>

                        @error('first_name')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="form-group mb-2">
                        <label class="mb-2" for="">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control"
                            placeholder="(5-20 letters)" required autofocus>

                        @error('last_name')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="form-group mb-2">
                        <label class="mb-2" for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" id="email" class="form-control" id="email"
                            aria-describedby="emailHelp" placeholder="Enter email" required autofocus>

                        @error('email')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="disabledSelect" class="form-label">Role</label>
                        <select id="disabledSelect" class="form-select" name="role" id="role">

                            @foreach ($role_data as $item)
                                <option value="{{ $item->role_name }}">{{ $item->role_name }}</option>
                            @endforeach
                        </select>

                        @error('role')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-2 mb-2">
                        <label class="me-3" for="selectGender">Gender</label>

                        @foreach ($gender_data as $item)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender"
                                    value="{{ $item->gender_desc }}">
                                <label class="form-check-label" for="">
                                    {{ $item->gender_desc }}
                                </label>
                            </div>
                        @endforeach

                        @error('gender')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label class="mb-2" for="picture">Display Picture</label>
                        <input type="file" class="form-control" name="picture" id="picture" />
                    </div>

                    <div class="form-group mb-2">
                        <label class="mb-2" for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                            required>

                        @error('password')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label class="mb-2" for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="password"
                            placeholder="Confirm Password" required>

                        @error('confirm_password')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="text-center mt-3">
                        <input type="submit" value="Sign Up" class="btn btn-warning">

                        <p class="mb-2 mt-3">Already Registered?
                            <a href="/login">Sign In Here</a>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
