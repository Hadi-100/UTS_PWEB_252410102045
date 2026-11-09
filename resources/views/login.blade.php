
@extends('layouts.app')

@section('title', 'Login - CampusHub')

@section('styles')
<style>
    .main-content {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-container {
        width: 90%;
        max-width: 400px;
        background: white;
        padding: 35px;
        border-radius: 17px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.08);
    }

    .login-container h2 {
        text-align: center;
        color: #2563eb;
        margin-bottom: 10px;
    }

    .login-container p {
        text-align: center;
        color: #777;
        margin-bottom: 30px;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        outline: none;
    }

    .form-group input:focus {
        border-color: #2563eb;
    }

    .login-container button {
        width: 100%;
        padding: 13px;
        background: #2563eb;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: bold;
    }

    .login-container button:hover {
        background: #1d4ed8;
    }

    .error {
        color: red;
        font-size: 13px;
        margin-bottom: 15px;
    }
</style>
@endsection

@section('content')

<div class="login-container">

    <h2>CampusHub</h2>
    <p>Selamat datang! Silakan masuk ke akun Anda.</p>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <div class="form-group">
            <label>Username</label>
            <input
                type="text"
                name="username"
                placeholder="Masukkan username"
                value="{{ old('username') }}"
                required
            >
        </div>

        <button type="submit">Masuk</button>

    </form>

</div>

@endsection
