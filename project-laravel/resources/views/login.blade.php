<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/login1.css" rel="stylesheet">
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}

</head>
<body>
@if (session()->has('success'))
    <div class="alert alert-succes alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('LoginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('LoginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
{{-- <div class="global-container">

    <div class="card Login-form">
        <div class="card-body">
            <h1 class="card-title text-center">Login</h1>
        </div>
        <div class="card-text">
            <form class="px-4 py-3" action="/login" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email"
                        class="form-control @error('email')
                        is-invalid
                    @enderror"
                        id="email" placeholder="email@example.com" name="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="/register" class="btn btn-primary">Sign in</a>
            </form>
        </div>
    </div>
</div> --}}
<div class="login-reg-panel">
    <div class="login-info-box">
        <h2>Sudah Mempunyai Akun?</h2>
        <label id="label-register" for="log-reg-show">Masuk</label>
        <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
    </div>

    <div class="register-info-box">
        <h2>Belum Mempunyai Akun?</h2>
        <label id="label-login" for="log-login-show">Klik Disini</label>
        <input type="radio" name="active-log-panel" id="log-login-show">
    </div>

    <div class="white-panel">
        <form action="/login" method="post">
            @csrf
            <div class="login-show">
                <h2>Masuk</h2>
                <input type="email" placeholder="Email" name="email"
                    class="@error('email')
                    is-invalid
                @enderror">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <input type="password" placeholder="Password" name="password">
                <input type="submit" value="Masuk">
                <a href="">Lupa Password?</a>
            </div>
        </form>
        <div class="register-show">
            <h2>Ayo Daftar!</h2>
            {{-- <input type="text" placeholder="Email">
            <input type="password" placeholder="Password">
            <input type="password" placeholder="Confirm Password"> --}}
            <a href="/sign2"><input type="submit" value="Klik Disini!"></a>
        </div>
    </div>
</div>

{{--  --}}
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.login-info-box').fadeOut();
        $('.login-show').addClass('show-log-panel');
    });


    $('.login-reg-panel input[type="radio"]').on('change', function() {
        if ($('#log-login-show').is(':checked')) {
            $('.register-info-box').fadeOut();
            $('.login-info-box').fadeIn();

            $('.white-panel').addClass('right-log');
            $('.register-show').addClass('show-log-panel');
            $('.login-show').removeClass('show-log-panel');

        } else if ($('#log-reg-show').is(':checked')) {
            $('.register-info-box').fadeIn();
            $('.login-info-box').fadeOut();

            $('.white-panel').removeClass('right-log');

            $('.login-show').addClass('show-log-panel');
            $('.register-show').removeClass('show-log-panel');
        }
    });
</script>

</body>

</html>
