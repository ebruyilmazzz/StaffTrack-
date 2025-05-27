<!DOCTYPE html>
<html>
<head>
    <title>Giriş Yap</title>
</head>
<body>
    <h2>Giriş Yap</h2>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="E-posta" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="Şifre" required>
        <button type="submit">Giriş Yap</button>
    </form>
    <a href="{{ route('register') }}">Hesabın yok mu? Kayıt ol</a>
</body>
</html>