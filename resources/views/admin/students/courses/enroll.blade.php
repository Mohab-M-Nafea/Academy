@extends('admin.layout.app')

@section('breadcrumb', "$student->first_name $student->last_name")

@section('page-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.layout.errors')

                    <form action="{{ route('student.enroll_store', $student) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-lg-2">Course</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6">

                                                @php
                                                    $studentCourses = $student->courses->toArray();
                                                @endphp

                                                <select class="form-select" name="course" required>
                                                    <option disabled selected>Select Course</option>

                                                    @foreach($courses as $course)
                                                        @if(!in_array($course, $studentCourses))
                                                            @php
                                                                $teacher = $course->teacher;
                                                            @endphp

                                                            <option value="{{ $course->id }}">{{ $course->name }} for {{ $teacher->first_name }} {{ $teacher->last_name }} - {{ $course->price }}</option>

                                                        @endif
                                                    @endforeach

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
