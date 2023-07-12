<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">@yield('breadcrumb', 'Good Morning ' . auth('admins')->user()->first_name . '!')</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>

                        @if(isset($breadcrumb))
                            @php
                                $count = 1
                            @endphp

                            @foreach($breadcrumb as $route => $name)
                                @if($count < count($breadcrumb))

                                    <li class="breadcrumb-item"><a href="{{ route($route, isset($params)? $params : []) }}">{{ $name }}</a>
                                    </li>

                                @else

                                    <li class="breadcrumb-item text-muted active">{{ $name }}
                                    </li>

                                @endif

                                @php
                                    $count++
                                @endphp
                            @endforeach
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-end">
                <div class="form-control bg-white border-0 custom-shadow custom-radius px-4 py-2">
                    {{ date('M d') }}
                </div>
            </div>
        </div>
    </div>
</div>
