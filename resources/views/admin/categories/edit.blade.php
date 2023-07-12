@extends('admin.layout.app')

@section('breadcrumb', "$category->name")

@section('page-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.layout.errors')

                    <form action="{{ route('category.update', $category) }}" method="post" enctype="multipart/form-data">
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
                                                       placeholder="Category Name" value="{{ old('name', $category->name) }}" required>
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
