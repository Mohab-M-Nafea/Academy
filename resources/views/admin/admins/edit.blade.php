@extends('admin.layout.app')

@section('breadcrumb', "$admin->first_name $admin->last_name")

@section('page-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.layout.errors')

                    <form action="{{ route('admin.update', $admin) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-body">
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2" for="name">Name</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" id="name" class="form-control" name="first_name"
                                                       placeholder="First Name" value="{{ old('first_name', $admin->first_name) }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="last_name"
                                                       placeholder="Last Name" value="{{ old('last_name', $admin->last_name) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2">Username</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="username"
                                                       placeholder="Username" value="{{ old('username', $admin->username) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2">Email</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" name="email"
                                                       placeholder="Email" value="{{ old('email', $admin->email) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2">Password</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6 mb-3 mb-m-0">
                                                <input type="password" class="form-control" name="password"
                                                       placeholder="Password">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="confirm_password"
                                                       placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2">Image</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="file" class="form-control" name="image"
                                                       placeholder="col-md-5">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-end">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <button type="reset" class="btn btn-dark">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
