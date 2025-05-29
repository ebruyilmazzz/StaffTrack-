<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e0e0e0);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-box {
            background-color: #fff;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

<div class="register-box">
    <h2 class="text-center mb-4">🚀 Kayıt Ol</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Ad Soyad</label>
            <input type="text" name="fullname" class="form-control" placeholder="Ad Soyad" value="{{ old('fullname') }}" required>
            @error('fullname') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">E-posta</label>
            <input type="email" name="email" class="form-control" placeholder="E-posta" value="{{ old('email') }}" required>
            @error('email') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Şifre</label>
            <input type="password" name="password" class="form-control" placeholder="Şifre" required>
            @error('password') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Şifre Tekrar</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Şifre Tekrar" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">✅ Kayıt Ol</button>

        <div class="mt-3 text-center">
            <a href="{{ route('login') }}">Zaten hesabın var mı? <strong>Giriş yap</strong></a>
        </div>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
