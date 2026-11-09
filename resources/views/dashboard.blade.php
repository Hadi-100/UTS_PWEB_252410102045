
@extends('layouts.app')

@section('title', 'Dashboard - CampusHub')

@section('styles')
<style>
    .main-content {
        padding: 35px 5%;
        display: block;
    }

    .welcome-section {
        margin-bottom: 30px;
    }

    .welcome-section h2 {
        color: #1e293b;
        font-size: 26px;
        margin-bottom: 8px;
    }

    .welcome-section p {
        color: #64748b;
        font-size: 14px;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 35px;
    }

    .stat-card {
        background: white;
        padding: 23px;
        border-radius: 12px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.05);

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .stat-card h3 {
        font-size: 14px;
        color: #64748b;
        font-weight: normal;
        margin-bottom: 8px;
    }

    .stat-card .total {
        font-size: 27px;
        font-weight: bold;
        color: #2563eb;
    }

    .section-title {
        color: #1e293b;
        font-size: 20px;
        margin-bottom: 18px;
    }

    .activity-container {
        background: white;
        border-radius: 12px;
        padding: 10px 22px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.05);
    }

    .activity-item {
        padding: 18px 0;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-item h4 {
        font-size: 15px;
        color: #334155;
        margin-bottom: 6px;
    }

    .activity-item p {
        font-size: 13px;
        color: #64748b;
    }

    .activity-status {
        font-size: 12px;
        color: #2563eb;
        background: #eff6ff;
        padding: 7px 11px;
        border-radius: 20px;
        white-space: nowrap;
    }

    @media (max-width: 650px) {
        .stats-container {
            grid-template-columns: 1fr;
        }

        .activity-item {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')

<div class="welcome-section">
    <h2>Selamat Datang, {{ $displayName }}!</h2>
    <p>Senang melihat Anda kembali di CampusHub.</p>
</div>

<div class="stats-container">

    @foreach ($statistics as $stat)
        <div class="stat-card">
            <h3>{{ $stat['title'] }}</h3>
            <div class="total">{{ $stat['total'] }}</div>
        </div>
    @endforeach

</div>

<h3 class="section-title">Aktivitas Terbaru</h3>

<div class="activity-container">

    @foreach ($activities as $activity)
        <div class="activity-item">
            <div>
                <h4>{{ $activity['title'] }}</h4>
            </div>

            <span class="activity-status">
                {{ $activity['status'] }}
            </span>
        </div>
    @endforeach

</div>

@endsection
