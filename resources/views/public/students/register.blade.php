@extends('public.layout.app')

@section('page-content')

    <div class="d-flex justify-content-center my-5">
        <div class="register-box mt-5">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <p class="login-box-msg">Register a new membership</p>

                    @include('public.layout.errors')

                    <form action="{{ route('student.store_student') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                        </div>
                         <div class="input-group mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}">
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                        </div>
                        <div class="form-group mb-3">
                            <select class="form-control" name="gender">
                                <option selected disabled hidden>Gender</option>
                                <option value="male" @selected(old('gender') === 'male')>Male</option>
                                <option value="female" @selected(old('gender') === 'female')>Female</option>
                            </select>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-4 offset-4 mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    {{--                <div class="social-auth-links text-center">--}}
                    {{--                    <a href="#" class="btn btn-block btn-primary">--}}
                    {{--                        <i class="fab fa-facebook mr-2"></i>--}}
                    {{--                        Sign up using Facebook--}}
                    {{--                    </a>--}}
                    {{--                    <a href="#" class="btn btn-block btn-danger">--}}
                    {{--                        <i class="fab fa-google-plus mr-2"></i>--}}
                    {{--                        Sign up using Google+--}}
                    {{--                    </a>--}}
                    {{--                </div>--}}

                    <a href="{{ route('student.login') }}" class="text-center">I already have a membership</a>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
    </div>

@endsection
