@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Personel Düzenle</h2>

    <form action="{{ route('personnel.update', $person->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">İsim</label>
            <input type="text" id="name" name="name" value="{{ old('name', $person->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="department_id" class="form-label">Departman</label>
            <input type="number" id="department_id" name="department_id" value="{{ old('department_id', $person->department_id) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Güncelle</button>
        <a href="{{ route('personnel.index') }}" class="btn btn-secondary ms-2">İptal</a>
    </form>
</div>
@endsection
