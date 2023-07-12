@extends('public.layout.app')

@section('page-content')

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>{{ $course->name }}</h2>
                            <p>Home<span>/</span><span>{{ $course->category->name }}</span><span>/</span>Courses<span>/</span><span>{{ $course->name }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid" src="{{ 'uploads/courses/' . $course->image }}" alt="">
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title_top">Objectives</h4>
                        <div class="content">
                            {{ $course->small_description }}
                        </div>
                        <h4 class="title">Course Outline</h4>
                        <div class="content">
                            {{ $course->description }}
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Trainer’s Name</p>
                                    <span class="color">{{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Course Price </p>
                                    <span>{{ $course->price }}</span>
                                </a>
                            </li>
                        </ul>

                        @if(auth()->user() && $course->student->find(auth()->user()->id))

                            <button class="btn_3 d-block" disabled>Enrolled</button>

                        @else

                            <form action="{{ route('course.enroll') }}" method="post">
                                @csrf
                                <input type="hidden" name="course" value="{{ $course->id }}">
                                <input type="submit" class="btn_1 d-block" value="Enroll the course">
                            </form>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

@endsection
