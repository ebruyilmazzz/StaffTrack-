<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Paneli - @yield('title', 'Dashboard')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        header {
            background-color: #222;
            color: white;
            padding: 10px 20px;
            margin-bottom: 30px;
        }
        nav a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        button {
            cursor: pointer;
            padding: 5px 10px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 3px;
        }
        button:hover {
            background-color: #0056b3;
        }
        form {
            display: inline;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('admin.dashboard') }}">Admin Anasayfa</a>
            <a href="{{ route('personnel.index') }}">Personeller</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Çıkış Yap</button>
            </form>
        </nav>
    </header>

    <div class="container">
        <h2>@yield('title', 'Admin Paneli')</h2>
        @yield('content')
    </div>
</body>
</html>
