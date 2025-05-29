@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>📝 Personel Bilgilerini Güncelle</h2>

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

    <form action="{{ route('personnel.update', $person->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Ad</label>
                <input type="text" name="name" value="{{ old('name', $person->name) }}" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Soyad</label>
                <input type="text" name="surname" value="{{ old('surname', $person->surname) }}" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">T.C. Kimlik No</label>
                <input type="text" name="tc_no" value="{{ old('tc_no', $person->tc_no) }}" class="form-control" required maxlength="11">
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email', $person->email) }}" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Telefon</label>
                <input type="text" name="phone" value="{{ old('phone', $person->phone) }}" class="form-control" required maxlength="15">
            </div>

            <div class="col-md-6">
                <label class="form-label">Doğum Tarihi</label>
                <input type="date" name="birthday_date" value="{{ old('birthday_date', $person->birthday_date) }}" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Cinsiyet</label>
                <select name="gender" class="form-select" required>
                    <option value="">Seçiniz</option>
                    <option value="K" {{ old('gender', $person->gender) == 'K' ? 'selected' : '' }}>Kadın</option>
                    <option value="E" {{ old('gender', $person->gender) == 'E' ? 'selected' : '' }}>Erkek</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Pozisyon</label>
                <input type="text" name="position" value="{{ old('position', $person->position) }}" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Departman</label>
                <select name="department_id" class="form-select" required>
                    <option value="">Seçiniz</option>
                    @foreach($departments as $d)
                        <option value="{{ $d->id }}" {{ old('department_id', $person->department_id) == $d->id ? 'selected' : '' }}>
                            {{ $d->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Başlama Tarihi</label>
                <input type="date" name="starts_date" value="{{ old('starts_date', $person->starts_date) }}" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Durum</label>
                <select name="status" class="form-select" required>
                    <option value="1" {{ old('status', $person->status) == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('status', $person->status) == '0' ? 'selected' : '' }}>Pasif</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Resim</label>
                <input type="file" name="photo" class="form-control">

                @if(isset($person->photo))
                <img src="{{ asset('storage/' . $person->photo) }}" alt="{{ $person->name }}" class="img-fluid mt-2" style="max-height: 200px;">
                @endif
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">🔄 Güncelle</button>
            <a href="{{ route('personnel.index') }}" class="btn btn-secondary">⬅️ Geri</a>
        </div>
    </form>
</div>
@endsection
