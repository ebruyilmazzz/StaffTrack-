@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('check-in') }}" method="POST" class="mb-2">
        @csrf
        <button type="submit" class="btn btn-primary">Giriş Yap</button>
    </form>

    <form action="{{ route('check-out') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Çıkış Yap</button>
    </form>

    <hr>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Personel</th>
                <th>Tarih</th>
                <th>Giriş</th>
                <th>Çıkış</th>
                <th>Süre (dk)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $r)
                <tr>
                    <td>{{ $r->personnel->name ?? 'Bilinmiyor' }}</td>
                    <td>{{ \Carbon\Carbon::parse($r->date)->format('d.m.Y') }}</td>
                    <td>{{ $r->start_time }}</td>
                    <td>{{ $r->end_time ?? '-' }}</td>
                    <td>{{ $r->work_duration ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
