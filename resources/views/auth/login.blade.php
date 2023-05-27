@extends('layouts.guest')

@section('content')
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h2>Create Account</h2>
                <input type="text" name="name" class="@error('name') is-invalid @enderror" placeholder="Name" required />
                @error('name')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
                <input type="text" name="school_id" placeholder="School ID No." required />
                <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Sorsu Email"
                    required />
                @error('email')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
                <input type="password" name="password" placeholder="Password"
                    class="@error('password') is-invalid @enderror" required />
                @error('password')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
                <input type="password" name="password_confirmation" placeholder="Password Confirmation"
                    class="@error('password_confirmation') is-invalid @enderror" required autocomplete="new-password" />

                <br>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <img src="{{ asset('images/SSU.png') }}" alt="ssu_logo" height="100px">
                <h3>SORSU-BC Library Management System</h5>
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="form-control @error('email') is-invalid @enderror" required autofocus />
                    @error('email')
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror"
                        placeholder="Password" required />
                    @error('password')
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <input type="submit" value="Sign In" class="sub-button" />
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                    <br>
                    <span>Click on "Sign-In" button if you already have an account </span>
                </div>
                <div class="overlay-panel overlay-right">
                    <img src="{{ asset('images/open-book.png') }}" alt="open_book">
                    <h1>Hello, Friend!</h1>
                    <p>Enter the realm of knowledge and explore</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                    <br>
                    <span>Click on "Sign-up" button to create new account </span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-card-body -->
@endsection
