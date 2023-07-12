<!doctype html>
<html lang="en">

@include('public.layout.header')

<body>
<main class="container">
    <div class="col-8 mx-auto my-md-4 my-5">
        <h2>Password Reset</h2>
        <p>An email with further instructions has been sent to your email address. Please check your inbox and follow
            the instructions to reset your password.</p>
        <p>If you don't receive the email, please check your spam folder.</p>
        <a class="button mt-3" href="{{ route('home') }}">Go back to Homepage</a>
    </div>
</main>
</body>
</html>
