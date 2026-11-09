<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CampusHub')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f0f5ff;
            color: #1e293b;
        }

        .navbar {
            background: white;
            padding: 18px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .navbar-menu a {
            text-decoration: none;
            color: #475569;
            font-size: 14px;
        }

        .navbar-menu a:hover {
            color: #2563eb;
        }

        .navbar h2 {
            color: #2563eb;
        }

        .navbar span {
            color: #64748b;
            font-size: 14px;
        }

        .main-content {
            width: 100%;
            min-height: calc(100vh - 140px);
            padding: 30px 6%;
        }

        .footer {
            background: white;
            padding: 30px;
            text-align: center;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 16px 5%;
            }

            .main-content {
                padding: 20px 5%;
            }
        }
    </style>

    @yield('styles')
</head>

<body>
    @include('components.navbar')

    <main class="main-content">
        @yield('content')
    </main>

    <x-footer />
</body>
</html>