@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">📋 Personel Listesi</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3 text-end">
        <a href="{{ route('personnel.create') }}" class="btn btn-success">
            ➕ Yeni Personel Ekle
        </a>
    </div>

    <div class="table-responsive shadow rounded">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Foto</th>
                    <th>Ad Soyad</th>
                    <th>Departman</th>
                    <th>Görev</th>
                    <th>Başlama</th>
                    <th>Durum</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personnel as $p)
                    <tr>
                        <td><img src="{{ asset('uploads/' . $p->photo) }}" alt="profil" width="50" class="rounded-circle"></td>
                        <td>{{ $p->name }} {{ $p->surname }}</td>
                        <td>{{ $p->department->name ?? 'Tanımsız' }}</td>
                        <td>{{ $p->position }}</td>
                        <td>{{ $p->starts_date }}</td>
                        <td>
                            <span class="badge bg-{{ $p->status == 'Aktif' ? 'success' : 'secondary' }}">
                                {{ $p->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('personnel.edit', $p->id) }}" class="btn btn-primary btn-sm">✏️</a>
                            <form action="{{ route('personnel.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Silmek istediğine emin misin?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($personnel->isEmpty())
                    <tr><td colspan="7" class="text-center text-muted">Kayıtlı personel yok.</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
