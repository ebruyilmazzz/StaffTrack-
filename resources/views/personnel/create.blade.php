@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>👩‍💼 Yeni Personel Ekle</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Hata!</strong> Lütfen formu kontrol ediniz.<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>🔴 {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('personnel.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Ad</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Soyad</label>
                <input type="text" name="surname" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">T.C. Kimlik No</label>
                <input type="text" name="tc_no" class="form-control" required maxlength="11">
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Telefon</label>
                <input type="text" name="phone" class="form-control" required maxlength="15">
            </div>

            <div class="col-md-6">
                <label class="form-label">Doğum Tarihi</label>
                <input type="date" name="birthday_date" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Cinsiyet</label>
                <select name="gender" class="form-select" required>
                    <option value="">Seçiniz</option>
                    <option value="Kadın">Kadın</option>
                    <option value="Erkek">Erkek</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Pozisyon</label>
                <input type="text" name="position" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Departman</label>
                <select name="department_id" class="form-select" required>
                    <option value="">Seçiniz</option>
                    @foreach($departments as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Başlama Tarihi</label>
                <input type="date" name="starts_date" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Durum</label>
                <select name="status" class="form-select" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Pasif">Pasif</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Resim</label>
                <input type="file" name="photo" class="form-control">

            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">💾 Kaydet</button>
            <a href="{{ route('personnel.index') }}" class="btn btn-secondary">⬅️ Geri</a>
        </div>
    </form>
</div>
@endsection
