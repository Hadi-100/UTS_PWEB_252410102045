@extends('layouts.app')

@section('title', 'Pengelolaan - CampusHub')

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

    .section-title {
        color: #1e293b;
        font-size: 18px;
        margin-bottom: 15px;
    }

    .content-card {
        background: white;
        padding: 0 12px;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .course-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .course-item:last-child {
        border-bottom: none;
    }

    .course-item h4,
    .task-item h4 {
        font-size: 14px;
        color: #475569;
    }

    .course-item a {
        color: #2563eb;
        text-decoration: none;
        font-size: 13px;
    }

    .task-item {
        padding: 17px 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .task-item:last-child {
        border-bottom: none;
    }

    .task-item p {
        color: #64748b;
        font-size: 12px;
        margin-top: 7px;
    }
</style>
@endsection


@section('content')

<h2 class="page-title">Pengelolaan</h2>
<p class="page-description">
    Kelola mata kuliah dan tugas perkuliahan.
</p>

<h3 class="section-title">Mata Kuliah</h3>

<div class="content-card">

    @foreach ($matakuliah as $mata)
        <div class="course-item">
            <h4>{{ $mata }}</h4>
            <a href="{{ route('matakuliah.detail', 
            $mata == 'Pemrograman Berbasis Web' ? 'pemrograman-web' : 
            ($mata == 'Basis Data' ? 'basis-data' : 'pemrograman-objek')) }}">Detail →</a>
        </div>
    @endforeach

</div>

<h3 class="section-title">Tugas Aktif</h3>

<div class="content-card">

    @foreach ($tugas as $item)
        <div class="task-item">
            <h4>{{ $item['nama'] }}</h4>
            <p>{{ $item['matakuliah'] }}</p>
            <p>{{ $item['status'] }}</p>
            <p>Deadline: {{ $item['deadline'] }}</p>
        </div>
    @endforeach

</div>

@endsection