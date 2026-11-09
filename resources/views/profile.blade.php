
@extends('layouts.app')

@section('title', 'Profile - CampusHub')

@section('styles')
<style>
    .main-content {
        padding: 20px 5%;
        display: block;
    }

    .page-title {
        color: #1e293b;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .page-description {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 25px;
    }

    .profile-card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.05);
        max-width: 700px;
        margin: 0 auto;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .avatar {
        width: 85px;
        height: 85px;
        border-radius: 50%;
        background: #dbeafe;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 35px;
        margin: 0 auto 15px;
    }

    .profile-header h3 {
        font-size: 19px;
        color: #1e293b;
        margin-bottom: 5px;
    }

    .profile-header p {
        font-size: 13px;
        color: #64748b;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        color: #475569;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 14px;
        outline: none;
        background: white;
        color: #1e293b;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #6599ff;
    }

    .logout-btn {
        background: #fee2e2;
        color: #dc2626;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 10px;
    }

    .logout-btn:hover {
        background: #fecaca;
    }

    .save-btn {
        background: #6599ff;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
    }

    .save-btn:hover {
        background: #4b83ed;
    }

    .error {
        color: #dc2626;
        font-size: 12px;
        margin-top: 5px;
    }
</style>
@endsection

@section('content')

<h2 class="page-title">Profile</h2>

<p class="page-description">
    Informasi profil mahasiswa.
</p>

<div class="profile-card">

    <div class="profile-header">

        <div class="avatar">
            👤
        </div>

        <h3>{{ $username }}</h3>

        @if ($nickname)
            <p>"{{ $nickname }}"</p>
        @endif

        <p>Mahasiswa CampusHub</p>

    </div>

    <form action="{{ url('/profile') }}" method="POST">

        @csrf

        <div class="form-group">
            <label>Nama</label>

            <input type="text"
                   value="{{ $username }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Nickname (Opsional)</label>

            <input type="text"
                   name="nickname"
                   placeholder="Masukkan nickname"
                   value="{{ old('nickname', $nickname) }}">

            @error('nickname')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="save-btn">
            Simpan
        </button>

    </form>

    <form action="{{ url('/logout') }}" method="POST">

        @csrf

        <button type="submit" class="logout-btn">
            Log Out
        </button>

    </form>

</div>

@endsection
