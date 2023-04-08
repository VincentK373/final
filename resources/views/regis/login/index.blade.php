<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OnLearn | LogIn</title>
    <link rel="stylesheet" href="css/login.css" />
</head>

<body>
    <div style="width: 100%; background-color:black; text-align:center; color:white">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade
      show" role="alert">
                {{ session('loginError') }} <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div id="content">

        <div id="kanan">
            <h1>LOGO</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Deserunt iste temporibus rerum.
            </p>
        </div>

        <div id="kiri">
            <form action="/login" method="POST">
                @csrf
                <div class="atas">
                    <input type="text" name="username" id="username" placeholder="  Username"
                        class="@error('email') is-invalid
                    @enderror" autofocus required
                        value="{{ old('username') }}" />
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="password" name="password" id="password" placeholder="  Password"
                        class="@error('password') is-invalid @enderror" required />
                </div>
                <div class="bawah">
                    <div class="check">
                        <input type="checkbox" id="remember" name="remember" value="remember" />
                        <label for="remember"> Remember me</label><br />
                    </div>

                    <input type="submit" value="Login" />
                </div>
            </form>

            <div class="kiri_bawah">
                <a href="#">Forgot password?</a>
                <span></span>

                <div class="btn">
                    <a href="/signup">Create new account</a>
                </div>

                <a href="/">Continue as guest</a>
            </div>
        </div>
    </div>

</body>

</html>
