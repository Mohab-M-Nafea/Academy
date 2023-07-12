@extends('public.layout.app')

@section('page-content')
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Our Categories</h2>
                            <p>Home<span>/</span>Categories</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::review_part start::-->
    <section class="special_cource padding_top pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <h2>Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($categories as $category)
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="single_special_cource">
                            <img src="{{ $category->image }}" class="special_img" alt="">
                            <div class="special_cource_text text-center">
                                <a href="{{ route('category.show', $category)}}">
                                    <h3>{{ $category->name }}</h3>
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach

                    <div class="d-flex justify-content-center w-100 mt-5">
                        {!! $categories->links() !!}
                    </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->
@endsection
