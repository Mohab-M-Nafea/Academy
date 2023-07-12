@extends('public.layout.app')

@section('page-content')

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Our Courses</h2>
                            <p>Home

                                @if(Route::currentRouteName() === 'category.show')
                                    <span>/</span><span>{{ $category->name }}</span>
                                @endif

                                <span>/</span>Courses</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::review_part start::-->
    <section class="special_cource padding_top mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <h2>Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($courses as $course)

                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="single_special_cource">
                            <img src="{{ $course->image }}" class="special_img" alt="">
                            <div class="special_cource_text">

                                @if(Route::currentRouteName() === 'category.show')

                                    <div class="special_cource_text p-0 pb-2 border-0">
                                        <h4>{{ $course->price }}</h4>
                                    </div>

                                @else

                                    <a href="{{ route('category.show', $course->category) }}"
                                       class="btn_4">{{ $course->category->name }}</a>
                                    <h4>{{ $course->price }}</h4>

                                @endif

                                <a href="{{ route('course.show', $course) }}">
                                    <h3>{{ $course->name }}</h3>
                                </a>
                                <p>{{ $course->small_description }}</p>
                                <div class="author_info">
                                    <div class="author_img">
                                        <img src="{{ $course->teacher->image }}" class="rounded-circle h-100" style="aspect-ratio: 1/1;" alt="">
                                        <div class="author_info_text">
                                            <p>Conduct by:</p>
                                            <h5>{{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

                <div class="d-flex justify-content-center w-100 mt-5">
                    {!! $courses->links() !!}
                </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->

@endsection
