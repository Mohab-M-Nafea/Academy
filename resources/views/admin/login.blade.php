<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('public/img/favicon.png') }}">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('admin/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/login.css') }}">
</head>
<body id="particles-js">
<div class="animated bounceInDown">
    <div class="container">
            <span class="error animated tada" id="msg" @if($errors->any()) style="display: inline-table" @endif>
                {{ $errors->first() }}
            </span>
        <form name="form1" class="box" onsubmit="" action="{{ route('admin.auth') }}" method="post">
            <h4>Admin<span>Dashboard</span></h4>
            <h5>Sign in to your account.</h5>
            @csrf

            <input type="text" name="email" placeholder="Email" autocomplete="off" value="{{ old('email') }}">
            <i class="typcn fas fa-eye" id="eye"></i>
            <input type="password" name="password" placeholder="Password" id="pwd" autocomplete="off">
            <input type="submit" value="Sign in" class="btn1">
        </form>
    </div>
</div>
<footer>
    <script src="{{ asset('admin/js/particles.min.js') }}"></script>
    <script src="{{ asset('admin/js/login.js') }}"></script>
</footer>
</body>
</html>
