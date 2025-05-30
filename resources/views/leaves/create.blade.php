@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Yeni İzin Talebi Ekle</h3>

    <form action="{{ route('leaves.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="leave_type" class="form-label">İzin Türü</label>
            <select name="leave_type" id="leave_type" class="form-select" required>
                <option value="">Seçiniz</option>
                <option value="Yıllık">Yıllık</option>
                <option value="Hastalık">Hastalık</option>
                <option value="Mazeret">Mazeret</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Başlangıç Tarihi</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Bitiş Tarihi</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Açıklama (Opsiyonel)</label>
            <textarea name="description" id="description" rows="3" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">İzin Talebini Gönder</button>
        <a href="{{ route('leaves.index') }}" class="btn btn-secondary ms-2">İptal</a>
    </form>
</div>
@endsection
