@extends('layout.login_layout')
@section('title', 'Login Page')
{{-- @push('styles')
    @vite('resources/css/layout.css')
@endpush --}}

@section('content')
    <div class="main-form-container">
        <div class="form-container">
            <div class="details-form">
                <div class="details-header">
                    <h1>Welcome to Blogpost</h1>
                </div>
                <div class="item-link">
                        <a href="{{ route('register.page') }}">
                            Sign Up
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                </div>
            </div>
            <div class="input-form">
                 @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3"
                    role="alert"
                    style="z-index: 1050; min-width: 300px; max-width: 600px;">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3"
                    role="alert"
                    style="z-index: 1050; min-width: 300px; max-width: 600px;">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="input-form-header">
                    <h1>Login</h1>
                </div>
                <form class="login-form" id="loginForm" novalidate
                action="{{ route('login.form')}}" method="POST">
                @csrf
                    <div class="form-data">
                        <label for="email">Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-data">
                        <label for="password">Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="form-btn">
                        <button type="submit"><span>Login</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="login-container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3"
            role="alert"
            style="z-index: 1050; min-width: 300px; max-width: 600px;">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3"
            role="alert"
            style="z-index: 1050; min-width: 300px; max-width: 600px;">
                {{ session('error') }}
            </div>
        @endif
        <div class="login-card">
            <div class="login-header">
                <div class="neu-icon">
                    <div class="icon-inner">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </div>
                </div>
                <h2>Welcome back</h2>
                <p>Please sign in to continue</p>
            </div>
            <form class="login-form" id="loginForm" novalidate
                action="{{ route('login.form')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="input-group neu-input">
                        <input type="email" id="email" name="email" required autocomplete="email" placeholder=" ">
                        <label for="email">Email address</label>
                        <div class="input-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </div>
                    </div>
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="form-group">
                    <div class="input-group neu-input password-group">
                        <input type="password" id="password" name="password" required autocomplete="current-password" placeholder=" ">
                        <label for="password">Password</label>
                        <div class="input-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0110 0v4"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <button type="submit" class="neu-button login-btn">
                    <span class="btn-text">Sign In</span>
                    <div class="btn-loader">
                        <div class="neu-spinner"></div>
                    </div>
                </button>
            </form>

            <div class="signup-link">
                <p>Don't have an account? <a href="{{ route('register.page') }}">Sign up</a></p>
            </div>
        </div>
    </div> --}}

    <script>
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');

                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);
    </script>
@endsection