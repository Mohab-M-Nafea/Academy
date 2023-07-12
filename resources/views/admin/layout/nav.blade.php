<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-lg">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('public/img/logo.png') }}" alt="" class="img-fluid">
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
               data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">

                        @if(empty($admin->image))

                            <div
                                class="btn btn-primary d-inline-flex justify-content-center align-items-center rounded-circle"
                                style="aspect-ratio: 1/1; width: 40px">{{ $admin->first_name[0] }}{{ $admin->last_name[0] }}
                            </div>

                        @else

                            <img src="{{ asset('uploads/admins/' . $admin->image) }}" alt="user"
                                 class="rounded-circle" style="aspect-ratio: 1/1; width: 40px">

                        @endif

                        <span class="d-inline-block"><span class="d-none d-lg-inline-block">Hello,</span> <span
                                class="text-dark">{{ $admin->first_name }} {{ $admin->last_name }}</span> <i
                                data-feather="chevron-down"
                                class="svg-icon"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="{{ route('admin.profile') }}"><i data-feather="user"
                                                                                        class="svg-icon me-2 ms-1"></i>
                            My Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                                                                              class="svg-icon me-2 ms-1"></i>
                            Account Setting</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('admin.logout') }}" method="post">
                            @csrf

                            <button type="submit" class="dropdown-item"><i data-feather="power"
                                                                                           class="svg-icon me-2 ms-1"></i>
                                Logout</button>
                        </form>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
