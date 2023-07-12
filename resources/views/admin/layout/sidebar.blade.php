<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('dashboard') }}"
                                             aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Users</span></li>

                <li class="sidebar-item @if(Request::segment(2) === 'admins') selected @endif"> <a class="sidebar-link has-arrow @if(Request::segment(2) === 'admins') active @endif" href="javascript:void(0)"
                                             aria-expanded="@if(Request::segment(2) === 'admins') true @else false @endif"><i data-feather="award" class="feather-icon"></i><span
                            class="hide-menu">Admins
                                </span></a>
                    <ul aria-expanded="@if(Request::segment(2) === 'admins') true @else false @endif" class="collapse first-level base-level-line @if(Request::segment(2) === 'admins') in @endif">
                        <li class="sidebar-item"><a href="{{ route('admins') }}" class="sidebar-link"><span
                                    class="hide-menu"> All Admins
                                        </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('admin.add') }}" class="sidebar-link"><span
                                    class="hide-menu"> Add Admin
                                        </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item @if(Request::segment(2) === 'teachers') selected @endif"> <a class="sidebar-link has-arrow @if(Request::segment(2) === 'teachers') active @endif" href="javascript:void(0)"
                                             aria-expanded="@if(Request::segment(2) === 'teachers') true @else false @endif"><i data-feather="briefcase" class="feather-icon"></i><span
                            class="hide-menu">Teachers </span></a>
                    <ul aria-expanded="@if(Request::segment(2) === 'teachers') true @else false @endif" class="collapse first-level base-level-line @if(Request::segment(2) === 'teachers') in @endif">
                        <li class="sidebar-item"><a href="{{ route('teachers') }}" class="sidebar-link"><span
                                    class="hide-menu"> All Teachers
                                        </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('teacher.add') }}" class="sidebar-link"><span
                                    class="hide-menu"> Add Teacher
                                        </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item @if(Request::segment(2) === 'students') selected @endif"> <a class="sidebar-link has-arrow @if(Request::segment(2) === 'students') active @endif" href="javascript:void(0)"
                                             aria-expanded="@if(Request::segment(2) === 'students') true @else false @endif"><i data-feather="users" class="feather-icon"></i><span
                            class="hide-menu">Students </span></a>
                    <ul aria-expanded="@if(Request::segment(2) === 'students') true @else false @endif" class="collapse first-level base-level-line @if(Request::segment(2) === 'students') in @endif">
                        <li class="sidebar-item"><a href="{{ route('students') }}" class="sidebar-link"><span
                                    class="hide-menu"> All Students
                                        </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('student.add') }}" class="sidebar-link"><span
                                    class="hide-menu"> Add Student
                                        </span></a>
                        </li>
                    </ul>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Education</span></li>
                <li class="sidebar-item @if(Request::segment(2) === 'categories') selected @endif"> <a class="sidebar-link has-arrow @if(Request::segment(2) === 'categories') active @endif" href="javascript:void(0)"
                                             aria-expanded="@if(Request::segment(2) === 'categories') true @else false @endif"><i data-feather="bookmark" class="feather-icon"></i><span
                            class="hide-menu">Categories </span></a>
                    <ul aria-expanded="@if(Request::segment(2) === 'categories') true @else false @endif" class="collapse  first-level base-level-line @if(Request::segment(2) === 'categories') in @endif">
                        <li class="sidebar-item"><a href="{{ route('admin.categories') }}" class="sidebar-link"><span
                                    class="hide-menu"> All Categories
                                        </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('category.add') }}" class="sidebar-link"><span
                                    class="hide-menu"> Add Category
                                        </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item @if(Request::segment(2) === 'courses') selected @endif"> <a class="sidebar-link has-arrow @if(Request::segment(2) === 'courses') active @endif" href="javascript:void(0)"
                                             aria-expanded="@if(Request::segment(2) === 'courses') true @else false @endif"><i data-feather="book" class="feather-icon"></i><span
                            class="hide-menu">Courses </span></a>
                    <ul aria-expanded="@if(Request::segment(2) === 'courses') true @else false @endif" class="collapse first-level base-level-line @if(Request::segment(2) === 'courses') in @endif">
                        <li class="sidebar-item"><a href="{{ route('admin.courses') }}" class="sidebar-link"><span
                                    class="hide-menu"> All Courses
                                        </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('course.add') }}" class="sidebar-link"><span
                                    class="hide-menu"> Add Course
                                        </span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
