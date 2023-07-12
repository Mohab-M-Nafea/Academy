@extends('admin.layout.app')

@section('page-style')

    <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.dataTables.min.css') }}">

@endsection

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
                                <th>Specialization</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($teachers as $index => $teacher)

                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>

                                        @if(is_null($teacher->image))
                                            No Image
                                        @else

                                            <img src="{{ asset("uploads/admins/$teacher->image") }}"
                                                 class="card-img"
                                                 alt="{{ $teacher->first_name }} {{ $teacher->last_name }}">

                                        @endif

                                    </td>
                                    <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                                    <td>{{ $teacher->specialization }}</td>
                                    <td>
                                        <a href="{{ route('teacher.edit', $teacher) }}" role="button"
                                           class="btn waves-effect waves-light btn-sm btn-rounded btn-success"><i
                                                class="fas fa-pencil-alt"></i> Edit</a>
                                        <form method="post" action="{{ route('teacher.delete', $teacher) }}" style="display: initial">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn waves-effect waves-light btn-sm btn-rounded btn-danger">
                                                <i
                                                    class="fas fa-times"></i> Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('teacher.courses', $teacher) }}" role="button"
                                           class="btn waves-effect waves-light btn-sm btn-rounded btn-info"><i
                                                class="fas fa-eye"></i> Courses</a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Specialization</th>
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
