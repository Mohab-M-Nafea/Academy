@extends('admin.layout.app')

@section('breadcrumb', 'New Student')

@section('page-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.layout.errors')

                    <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2">Name</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="first_name"
                                                       placeholder="Name" value="{{ old('first_name') }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="last_name"
                                                       placeholder="Name" value="{{ old('last_name') }}" required>
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
                                                       placeholder="Username" value="{{ old('username') }}" required>
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
                                                       placeholder="Email" value="{{ old('email') }}" required>
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
                                                       placeholder="Password" required>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="confirm_password"
                                                       placeholder="Confirm Password" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-lg-10 offset-2">
                                        <div class="row">
                                            <div class="col-md-6 mb-3 mb-m-0">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone"
                                                       placeholder="Phone" value="{{ old('phone') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Specialization</label>
                                                <input type="text" class="form-control" name="specialization"
                                                       placeholder="Specialization" value="{{ old('specialization') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2">Gender</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select class="form-select" name="gender" required>
                                                    <option disabled selected>Select Gender</option>
                                                    <option value="male" @if(old('gender') === 'male') selected @endif>Male</option>
                                                    <option value="female" @if(old('gender') === 'female') selected @endif>Female</option>
                                                </select>
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
