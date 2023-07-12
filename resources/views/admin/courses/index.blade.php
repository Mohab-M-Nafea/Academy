@extends('admin.layout.app')

@section('page-style')

    <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.dataTables.min.css') }}">

@endsection

@section('breadcrumb', (isset($parent)? $parent . ' ': '') . 'Courses')

@section('page-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($courses as $index => $course)

                                <tr class="align-middle">
                                    <td>{{ $index + 1 }}</td>
                                    <td>

                                        @if(is_null($course->image))
                                            No Image
                                        @else

                                            <img src="{{ asset("uploads/courses/$course->image") }}"
                                                 class="card-img"
                                                 alt="{{ $course->name }}">

                                        @endif

                                    </td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->small_description }}</td>
                                    <td>{{ $course->price }}</td>
                                    <td>
                                        <a href="{{ route('course.edit', $course) }}" role="button"
                                           class="btn waves-effect waves-light btn-sm btn-rounded btn-success"><i
                                                class="fas fa-pencil-alt"></i> Edit</a>
                                        <form action="{{ route('course.delete', $course) }}" method="post" style="display: initial">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="btn waves-effect waves-light btn-sm btn-rounded btn-danger"><i
                                                    class="fas fa-times"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')

    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/js/datatable-basic.init.js') }}"></script>

@endsection
