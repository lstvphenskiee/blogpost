@extends('layout.login_layout')
@section('title', 'Registration')

@section('content')
    <div class="main-form-container">
        <div class="form-container register-form">
            <div class="details-form">
                <div class="details-header">
                    <h1>Welcome to Blogpost</h1>
                </div>
                <div class="item-link">
                        <a href="{{ route('login.page') }}">
                            <i class="fa-solid fa-arrow-left"></i>
                            Login
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
                    <h1>Register</h1>
                </div>
                <form class="login-form" id="loginForm" novalidate
                action="{{ route('register.form')}}" method="POST">
                @csrf
                    <div class="form-data">
                        <label for="email">User name</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-data">
                        <label for="email">Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-data">
                        <label for="password">Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="form-data">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="password_confirmation" required>
                    </div>
                    <div class="form-btn">
                        <button type="submit"><span>Login</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="login-container">
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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
                <h2>Welcome to Register</h2>
                <p>Register your Account</p>
            </div>
            <form class="login-form" id="loginForm" novalidate
                action="{{ route('register.form')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="input-group neu-input">
                        <input type="text" id="name" name="name" required placeholder=" ">
                        <label for="email">User Name</label>
                        <div class="input-icon">
                             <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="input-group neu-input">
                        <input type="email" id="email" name="email" required placeholder=" ">
                        <label for="email">Email address</label>
                        <div class="input-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group neu-input password-group">
                        <input type="password" id="password" name="password" required  placeholder=" ">
                        <label for="password">Password</label>
                        <div class="input-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0110 0v4"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group neu-input password-group">
                        <input type="password" id="password" name="password_confirmation" required placeholder=" ">
                        <label for="password">Confirm Password</label>
                        <div class="input-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0110 0v4"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <button type="submit" class="neu-button login-btn">
                    <span class="btn-text">Register</span>
                    <div class="btn-loader">
                        <div class="neu-spinner"></div>
                    </div>
                </button>
            </form>

            <div class="signup-link">
                <p>Already have an account? <a href="{{ route('login.page')}}">Login</a></p>
            </div>
        </div>
    </div> --}}

@endsection