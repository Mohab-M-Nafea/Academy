@extends('admin.layout.app')

@section('page-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.layout.errors')

                    <form action="{{ route('teacher.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2">Name</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6 mb-3 mb-m-0">
                                                <input type="text" class="form-control" name="first_name"
                                                       placeholder="First Name"
                                                       value="{{ old('first_name') }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="last_name"
                                                       placeholder="Last Name"
                                                       value="{{ old('last_name') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-lg-10 offset-md-2">
                                        <div class="row">
                                            <div class="col-md-6 mb-3 mb-m-0">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone"
                                                       placeholder="Phone" value="{{ old('phone') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Specialization</label>
                                                <input type="text" class="form-control" name="specialization"
                                                       placeholder="Specialization"
                                                       value="{{ old('specialization') }}"
                                                       required>
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
                                                    <option value="male"
                                                            @if(old('gender') === 'male') selected @endif>Male
                                                    </option>
                                                    <option value="female"
                                                            @if(old('gender') === 'female') selected @endif>Female
                                                    </option>
                                                </select>
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
                                                <input type="file" class="form-control" name="image">
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
