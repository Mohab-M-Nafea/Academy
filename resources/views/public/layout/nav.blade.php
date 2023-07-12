<!--::header part start::-->
<header @class([
        'main_menu',
        'single_page_menu' => in_array(Route::currentRouteName(), $routes),
        'home_menu' => ! in_array(Route::currentRouteName(), $routes),
])>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}"> <img
                            src="{{ asset('public/img/logo.png') }}"
                            alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                         id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categories') }}">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('courses') }}">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>

                            @if(auth()->user())

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                       data-bs-toggle="dropdown"
                                       aria-expanded="false">

                                        @if(empty($student->image))

                                            <div
                                                class="btn btn-primary d-inline-flex justify-content-center align-items-center rounded-circle"
                                                style="aspect-ratio: 1/1; width: 40px">{{ $student->first_name[0] }}{{ $student->last_name[0] }}
                                            </div>

                                        @else

                                            <img src="{{ asset('uploads/admins/' . $student->image) }}" alt="user"
                                                 class="rounded-circle" style="aspect-ratio: 1/1; width: 40px">

                                        @endif

                                        <span class="d-inline-block">
                                            <span>
                                                {{ $student->first_name }} {{ $student->last_name }}
                                            </span>
                                            <i data-feather="chevron-down"
                                               class="svg-icon"></i></span>
                                    </a>
                                    <div
                                        class="dropdown-menu dropdown-menu-end dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('student.profile', auth()->user()) }}">
                                            <i class="fa-solid fa-user"></i> My Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa-solid fa-gear"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('student.logout') }}" method="post">
                                            @csrf

                                            <button type="submit" class="dropdown-item">
                                                <i class="fa-solid fa-power-off"></i> Logout</button>
                                        </form>
                                    </div>
                                </li>

                            @else

                                <li class="d-block">
                                    <a class="btn_1" href="{{ route('student.login') }}">Login</a>
                                </li>

                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->
