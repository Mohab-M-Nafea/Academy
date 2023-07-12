@extends('public.layout.app')

@section('page-content')

    <div class="d-flex justify-content-center my-5">
        <div class="login-box mt-5">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

                    @include('public.layout.errors')

                    <form action="{{ route('student.forget.send') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <p class="mt-3 mb-1">
                        <a href="{{ route('student.login') }}">Login</a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('student.register') }}">Register a new membership</a>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
