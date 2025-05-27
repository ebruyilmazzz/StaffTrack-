@extends('layouts.app')

@section('content')
    <h2>Panel Ana Sayfa</h2>
    <p>Bu panelde personel bilgilerini görebilir, güncelleyebilir ve diğer işlemleri yapabilirsin.</p>

    <div class="personnel-info">
        <h3>Personel Bilgileri</h3>
        <ul>
            <li><strong>Ad Soyad:</strong> {{ Auth::user()->fullname }}</li>
            <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
            <li><strong>Rol:</strong> {{ Auth::user()->role }}</li>
        </ul>
        <h3>Son Giriş/Çıkış Saatleri</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tarih</th>
            <th>Giriş Saati</th>
            <th>Çıkış Saati</th>
        </tr>
    </thead>
    <tbody>
        @foreach($working_hours as $hour)
            <tr>
                <td>{{ $hour->date }}</td>
                <td>{{ $hour->clock_in }}</td>
                <td>{{ $hour->clock_out }}</td>
            </tr>
        @endforeach
    </tbody>
</table> 
    </div>

    <div class="panel-features">
        <h3>Panel Özellikleri</h3>
        <ul>
            <li><a href="#">Personel Listele</a></li>
            <li><a href="#">Yeni Personel Ekle</a></li>
            <li><a href="#">Profil Düzenle</a></li>
        </ul>
    </div>
@endsection
