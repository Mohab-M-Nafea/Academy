@extends('public.layout.app')

@section('page-content')

    <div class="d-flex justify-content-center my-5">
        <div class="login-box mt-5">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    @include('public.layout.errors')

                    <form action="{{ route('student.auth') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="remember" id="remember" @checked(old('remember'))>
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <p class="mb-1">
                        <a href="{{ route('student.forget') }}">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('student.register') }}" class="text-center">Register a new membership</a>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
