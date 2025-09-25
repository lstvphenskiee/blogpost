@extends('layout.login_layout')
@section('title', 'Registration')

@section('content')
<div class="login-main-container">
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-container">
        <h1>REGISTER</h1>
        <form action="{{ route('register.form')}}" method="POST">
            @csrf
            <div class="login-input">
                <label for="name">User name</label>
                <input type="text" name="name" required>
            </div>
            <div class="login-input">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="login-input">
                <label for="password">Password</label>
                <input type="password" name="password" id="pass">
            </div>
            <div class="login-input">
                <label for="confirmPass">Confirm Password</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <div class="login-input">
                <button type="submit">REGISTER</button>
            </div>
        </form>
        <div class="btn-link">
            <a href="{{ route('login.page')}}">Already Have an Account</a>
        </div>
    </div>
</div>

@endsection