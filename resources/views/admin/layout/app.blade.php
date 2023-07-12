<!DOCTYPE html>
<html lang="en">

@include('admin.layout.header')

<body>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

    @include('admin.layout.nav')

    @include('admin.layout.sidebar')

    <div class="page-wrapper">

        @include('admin.layout.breadcrumb')

        <div class="container-fluid">

                @yield('page-content')

        </div>
    </div>

    @include('admin.layout.footer')

</div>
</body>
</html>
