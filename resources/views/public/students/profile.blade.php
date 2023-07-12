@extends('public.layout.app')

@section('page-content')

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 col-12 mx-auto mb-3 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-6 my-md-auto mb-3 mx-md-0 mx-auto">

                                @if(empty($student->image))

                                    <div
                                        class="d-flex justify-content-center align-items-center bg-primary text-white rounded-circle w-100"
                                        style="aspect-ratio: 1/1; font-size: 200%">{{ $student->first_name[0] }} {{ $student->last_name[0] }}
                                    </div>

                                @else

                                    <img src="{{ asset('uploads/admins/' . $student->image) }}" alt="user"
                                         class="rounded-circle w-100" style="aspect-ratio: 1/1">

                                @endif

                            </div>
                            <div class="col-md-9 col-12 text-md-start text-center my-md-auto mx-md-0 mx-auto">
                                <h4>{{ $student->first_name }} {{ $student->last_name }}</h4>
                                <h5>{{ $student->username }}</h5>
                                <h5>{{ $student->email }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        @include('public.layout.errors')

                        <form action="{{ route('student.profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-body">
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <label class="col-lg-2" for="name">Name</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-md-6 mb-md-0 mb-3">
                                                    <input type="text" id="name" class="form-control" name="first_name"
                                                           placeholder="First Name"
                                                           value="{{ old('first_name', $student->first_name) }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="last_name"
                                                           placeholder="Last Name"
                                                           value="{{ old('last_name', $student->last_name) }}">
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
                                                           placeholder="Username"
                                                           value="{{ old('username', $student->username) }}" required>
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
                                                           placeholder="Email" value="{{ old('email', $student->email) }}"
                                                           required>
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
                                                <div class="col-md-6 mb-3 mb-md-0">
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
                                                    <input type="file" class="form-control-file" name="image"
                                                           placeholder="col-md-5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <button type="reset" class="btn btn-dark">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
