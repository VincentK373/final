@extends('home.part.main')
@section('container')
    <div class="row justify-content-center" style="margin-top: 180px; font-family: 'poppins'">
        <div class="col-md-4">
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
            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-7 fw-normal text-center" style="margin-bottom: 50px"><strong>Log In</strong></h1>
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="email" name="email"
                            class="form-control @error('email') is-invalid
                          
                        @enderror"
                            id="email" placeholder="name@gmail.com" autofocus required value="{{ old('email') }}">
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating" style="margin-bottom: 30px">
                        <input type="password" name="password"
                            class="form-control @error('email') is-invalid
                        @enderror" id="password"
                            placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
                </form>
                <small class="d-block text-center mt-3">Not Registeresd? <a href="/signup">Register here</a></small>
            </main>
        </div>
    </div>
@endsection
