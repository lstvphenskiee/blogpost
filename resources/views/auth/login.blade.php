@extends('layout.login_layout')
@section('title', 'Login Page')
{{-- @push('styles')
    @vite('resources/css/layout.css')
@endpush --}}

@section('content')
    <div class="login-main-container">

        @if (session('success'))
            <div class="alert-container">
                <p>{{ session('success')}}</p>
            </div>
        @endif

        <div class="form-container">
            <h1>LOGIN</h1>
            <form action="{{ route('login.form')}}" method="POST">
                @csrf
                <div class="login-input">
                    <label for="username">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="login-input">
                    <label for="pass">Password</label>
                    <input type="password" name="password" id="pass">
                </div>
                <login class="login-input">
                    <button type="submit">LOGIN</button>
                </login>
            </form>
            <div class="btn-link">
                <a href="{{ route('register.page')}}">Create Account</a>
            </div>
        </div>
    

    </div>
@endsection