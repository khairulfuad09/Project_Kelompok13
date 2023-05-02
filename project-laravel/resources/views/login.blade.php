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
<div class="global-container">

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
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
</div>

</body>

</html>
