@extends('layouts.app')

@section('content')
<div class="container">
    <h3>İzin Talepleri</h3>

    <a href="{{ route('leaves.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Yeni İzin Talebi Ekle
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ad Soyad</th>
                <th>İzin Türü</th>
                <th>Başlangıç</th>
                <th>Bitiş</th>
                <th>Açıklama</th>
                <th>Durum</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
                <tr>
                    <td>{{ $leave->user->fullname }}</td>
                    <td>{{ $leave->leave_type }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ $leave->description }}</td>
                    <td>
                        <span class="badge bg-{{ $leave->status === 'Onaylandı' ? 'success' : ($leave->status === 'Reddedildi' ? 'danger' : 'warning') }}">
                            {{ $leave->status }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('leaves.show', $leave->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Görüntüle</button>
                        </form>
                        @if($leave->status === 'Beklemede')
                            <form action="{{ route('leaves.approve', $leave->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Onayla</button>
                            </form>
                            <form action="{{ route('leaves.reject', $leave->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Reddet</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection
