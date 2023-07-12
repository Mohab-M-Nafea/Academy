@extends('public.layout.app')

@section('page-content')

    <div class="d-flex justify-content-center my-5">
        <div class="login-box mt-5">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <p class="login-box-msg">You are only one step a way from your new password, recover your password
                        now.</p>

                    @include('public.layout.errors')

                    <form action="{{ route('password.store') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="hidden" name="token" class="form-control" value="{{ $token }}">
                        </div>
                        <div class="input-group mb-3">
                            <input type="hidden" name="email" class="form-control" value="{{ $_GET['email'] }}"
                                   required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="Confirm Password" required>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Change password</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <p class="mt-3 mb-1">
                        <a href="{{ route('student.login') }}">Login</a>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
