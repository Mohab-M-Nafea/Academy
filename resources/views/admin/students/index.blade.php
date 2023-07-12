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
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Specialization</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($students as $index => $student)

                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                    <td>{{ $student->username }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->specialization }}</td>
                                    <td>
                                        <a href="{{ route('student.edit', $student) }}" role="button"
                                           class="btn waves-effect waves-light btn-sm btn-rounded btn-success"><i
                                                class="fas fa-pencil-alt"></i> Edit</a>
                                        <form action="{{ route('student.delete', $student) }}" method="post" style="display: initial">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="btn waves-effect waves-light btn-sm btn-rounded btn-danger"><i
                                                    class="fas fa-times"></i> Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('student.courses', $student) }}" role="button"
                                           class="btn waves-effect waves-light btn-sm btn-rounded btn-info"><i
                                                class="fas fa-eye"></i> Courses</a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
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
