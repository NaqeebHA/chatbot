@extends('layouts.page-with-chat-app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col mx-auto">
                <!-- Card Container for Login -->
                <div class="card rounded shadow-lg border-0">
                    <div class="card-body p-5">
                        <!-- Header -->
                        <h3 class="card-title text-center mb-4">Login to DebtHelp AI</h3>
                        <p class="text-center text-muted">Your trusted AI assistant for debt-related queries.</p>

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                       name="password" required placeholder="Enter your password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-warning btn-lg">Login</button>
                            </div>

                            <!-- Forgot Password and Register Links -->
                            <div class="text-center mt-3">
                                @if (Route::has('password.request'))
                                    <a class="text-warning" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                @endif
                                <br>
                                <a class="text-warning" href="{{ route('register') }}">Don't have an account? Register here.</a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Footer or Additional Info -->
                <div class="text-center mt-4">
                    {{-- <p class="text-muted">Need assistance? Chat with our AI chatbot in the bottom-right corner.</p> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
