<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Personel Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Personel Yönetim Paneli</h1>
    </header>
    <nav>
        <div>
            Hoş geldin, <strong>{{ Auth::user()->fullname }}</strong>
        </div>
        <div>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Çıkış Yap</button>
            </form>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        &copy; 2025 Şirketiniz. Tüm hakları saklıdır.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
