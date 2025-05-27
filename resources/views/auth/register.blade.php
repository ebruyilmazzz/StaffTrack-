<!DOCTYPE html>
<html>
<head>
    <title>Kayıt Ol</title>
</head>
<body>
    <h2>Kayıt Ol</h2>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="fullname" placeholder="Ad Soyad" value="{{ old('fullname') }}" required>
        @error('fullname') <div>{{ $message }}</div> @enderror

        <input type="email" name="email" placeholder="E-posta" value="{{ old('email') }}" required>
        @error('email') <div>{{ $message }}</div> @enderror

        <input type="password" name="password" placeholder="Şifre" required>
        @error('password') <div>{{ $message }}</div> @enderror

        <input type="password" name="password_confirmation" placeholder="Şifre Tekrar" required>

        <button type="submit">Kayıt Ol</button>
    </form>
    <a href="{{ route('login') }}">Zaten hesabın var mı? Giriş yap</a>
</body>
</html>