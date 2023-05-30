<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/login1.css" rel="stylesheet">

</head>

<body>
    {{-- <div class="global-container">
        <div class="card daftar-form">
            <div class="card-body">
                <h1 class="card-title text-center">Daftar</h1>
                <div class="df1">
                    <h4 class="card-title text-center">Pembeli</h4>
                    <img src="asset/Pembeli.png" alt="Pembeli" width="100px" height="100px">
                    <button type="submit" class="btn btn-primary">Daftar</button>

                </div>
                <div class="df1">
                    <h4 class="card-title text-center">Penjual</h4>
                    <img src="asset/Penjual.png" alt="Penjual" width="100px" height="100px">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </div> --}}
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

    <div class="login-reg-panel">
        <div class="login-info-box">
            <h2>Ingin Daftar Sebagai Pembeli?</h2>

            <label id="label-register" for="log-reg-show">Klik Disini!</label>
            <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
        </div>

        <div class="register-info-box">
            <h2>Ingin Menjadi Penjual?</h2>

            <label id="label-login" for="log-login-show">Klik Disini!</label>
            <input type="radio" name="active-log-panel" id="log-login-show">
        </div>

        <div class="white-panel">
            <form action="/register" method="post">
                @csrf
                <div class="login-show">
                    <h2>Daftar Pembeli</h2>
                    <input type="hidden" name="id_status" value="usr">
                    <input type="text" placeholder="Username" name="username"
                        class="@error('username')
                        is-invalid
                    @enderror">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="email" placeholder="Email" name="email"
                        class="@error('email')
                        is-invalid
                    @enderror">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" placeholder="Alamat" name="alamat"
                        class="@error('alamat')
                        is-invalid
                    @enderror">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="password" placeholder="Password" name="password"
                        class="@error('password')
                        is-invalid
                    @enderror">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="password" placeholder="Confirm Password" name="pasword_confirm"
                        class="@error('password_confirm')
                        is-invalid
                    @enderror">
                    @error('password_confirm')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="submit" value="Daftar">
                    <a href="/sign">Sudah Mempunyai akun?</a>
                </div>
            </form>
            <form action="/register" method="post">
                @csrf
                <div class="register-show">
                    <h2>Daftar Penjual</h2>
                    <input type="hidden" name="id_status" value="pnj">
                    <input type="text" placeholder="Username" name="username"
                        class="@error('username')
                        is-invalid
                    @enderror">
                    @error('usernmae')
                        <div class="invalid-feedback">
                            {{ $messgae }}
                        </div>
                    @enderror
                    <input type="email" placeholder="Email" name="email"
                        class="@error('email')
                        is-invalid
                    @enderror">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" placeholder="Alamat" name="alamat"
                        class="@error('alamat')
                        is-invalid
                    @enderror">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="password" placeholder="Password" name="password"
                        class="@error('password')
                        is-invalid
                    @enderror">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="password" placeholder="Confirm Password" name="password_confirm"
                        class="@error('password_confirm')
                        is-invalid
                    @enderror">
                    @error('password_confirm')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="submit" value="Daftar">
                    <a href="/sign">Sudah Mempunyai akun?</a>
                </div>
            </form>
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
