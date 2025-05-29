<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personel Paneli</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-action {
            margin: 0 2px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#"><i class="bi bi-person-badge-fill me-2"></i>Personel Paneli</a>
            <div class="d-flex align-items-center">
                <span class="text-white me-3">Hoş geldin, <strong>{{ Auth::user()->fullname }}</strong></span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-box-arrow-right"></i> Çıkış Yap</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">👥 Personel Listesi</h2>
            <a href="{{ route('personnel.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle me-1"></i> Yeni Personel Ekle
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover shadow-sm bg-white">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Ad Soyad</th>
                        <th>T.C. No</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Doğum Tarihi</th>
                        <th>Cinsiyet</th>
                        <th>Departman</th>
                        <th>Pozisyon</th>
                        <th>Başlama Tarihi</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personnel as $person)
                        <tr>
                            <td>{{ $person->id }}</td>
                            <td>{{ $person->name }} {{ $person->surname }}</td>
                            <td>{{ $person->tc_no }}</td>
                            <td>{{ $person->email }}</td>
                            <td>{{ $person->phone }}</td>
                            <td>{{ \Carbon\Carbon::parse($person->birthday_date)->format('d.m.Y') }}</td>
                            <td>{{ $person->gender }}</td>
                            <td>{{ $person->department->name ?? '-' }}</td>
                            <td>{{ $person->position }}</td>
                            <td>{{ \Carbon\Carbon::parse($person->starts_date)->format('d.m.Y') }}</td>
                            <td>
                                <span class="badge bg-{{ $person->status === 'Aktif' ? 'success' : 'danger' }}">
                                    {{ $person->status }}
                                </span>
                            </td>
                            <td class="text-nowrap">
                                <a href="{{ route('personnel.edit', $person->id) }}" class="btn btn-sm btn-primary btn-action">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('personnel.destroy', $person->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Silmek istediğinize emin misiniz?')" type="submit" class="btn btn-sm btn-danger btn-action">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($personnel->isEmpty())
                        <tr>
                            <td colspan="12" class="text-center text-muted">Kayıtlı personel bulunamadı.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </main>

    <footer class="bg-light text-center text-muted py-3 mt-5 shadow-sm">
        &copy; 2025 Şirketiniz. Tüm hakları saklıdır.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
        