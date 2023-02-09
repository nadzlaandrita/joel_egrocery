@extends('template.template')

@section('title', 'Profile')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/index_guest_style.css') }}">
@endsection

@section('content')

<div class="d-flex justify-content-center">
    <div class="card mb-3" style="max-width: 1020px">
        <div class="row g-0">
            @foreach($user_data as $data)

            <div class="col-md-4">
                <img src="{{$data->display_picture_link}}" class="img-fluid rounded-start" alt="{{$data->first_name}}">
            </div>

            <div class="col-md-8">

                <form class="row g-3 mx-2 mt-2" method="POST" action="{{ url('/edit-profile') }}"enctype="multipart/form-data">
                    @method("PATCH")
                    {{ csrf_field() }}

                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="" value="{{$data->first_name}}">

                        @error('first_name')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="" value="{{$data->last_name}}">

                        @error('last_name')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="" value="{{$data->email}}">

                        @error('email')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Role</label>
                        <button type="" class="btn btn-dark form-control" id="inputPassword4" disabled>{{$data->role->role_name}}</button>
                    </div>

                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Gender</label>

                        @foreach($gender_data as $gender)
                            <input type="radio" name="gender" class="form-check-input" id="inputAddress" placeholder="" value="{{$gender->gender_desc}}">
                            <label class="form-check-label" for="">{{$gender->gender_desc}}</label>
                        @endforeach

                        @error('gender')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Display Picture</label>
                        <input type="file" name="picture" class="form-control" id="" placeholder="">

                        @error('picture')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="">

                        @error('password')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="">

                        @error('confirm_password')
                            <div class="alert alert-dismissible alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid col-md-6 mx-auto">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>

            @endforeach
        </div>
    </div>
</div>


@endsection
