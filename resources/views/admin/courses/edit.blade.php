@extends('admin.layout.app')

@section('breadcrumb', "$course->name")

@section('page-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.layout.errors')

                    <form action="{{ route('course.update', $course) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-body">
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2">Name</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="name"
                                                       placeholder="Course Name" value="{{ old('name', $course->name) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2">Small Description</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="small_description"
                                                          placeholder="Small Description"
                                                          required>{{ old('small_description', $course->small_description) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2">Description</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="description"
                                                          placeholder="Description"
                                                          required>{{ old('description', $course->description) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2">Price</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6 mb-3 mb-m-0">
                                                <input type="text" class="form-control" name="price"
                                                       placeholder="Price" value="{{old('price', $course->price)}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2"></label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6 mb-3 mb-m-0">
                                                <select class="form-control" name="category"
                                                        required>
                                                    <option value="" hidden="hidden" disabled selected>Select Course
                                                        Category
                                                    </option>

                                                    @foreach($categories as $category)
                                                        <option
                                                            value="{{ $category->id }}"
                                                            @if(old('category', $course->category_id) === $category->id) selected @endif>{{ $category->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" name="teacher"
                                                        required>
                                                    <option value="" hidden="hidden" disabled selected>Select Course
                                                        Teacher
                                                    </option>

                                                    @foreach($teachers as $teacher)
                                                        <option
                                                            value="{{ $teacher->id }}"
                                                            @if(old('teacher', $course->teacher_id) === $teacher->id) selected @endif>{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
                                                    @endforeach

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
