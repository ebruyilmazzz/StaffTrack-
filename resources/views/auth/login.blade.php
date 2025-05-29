<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-box {
            background-color: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        .login-box h2 {
            margin-bottom: 30px;
            font-weight: bold;
            text-align: center;
            color: #333;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(101, 72, 255, 0.25);
            border-color: #6548ff;
        }
        .btn-primary {
            background-color: #6548ff;
            border-color: #6548ff;
        }
        .btn-primary:hover {
            background-color: #4c30cc;
        }
        .text-muted a {
            color: #6548ff;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>🔐 Giriş Yap</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>❌ {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">📧 E-posta</label>
            <input type="email" name="email" class="form-control" placeholder="E-posta adresiniz" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">🔑 Şifre</label>
            <input type="password" name="password" class="form-control" placeholder="Şifrenizi girin" required>
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary">🚪 Giriş Yap</button>
        </div>

        <div class="text-center text-muted">
            Hesabın yok mu? <a href="{{ route('register') }}">Kayıt ol</a>
        </div>
    </form>
</div>

</body>
</html>
