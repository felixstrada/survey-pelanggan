<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('evaluation.png') }}">
    <title>Dashboard Hasil Survei</title>
    <!-- CDN Bootstrap 5 untuk memastikan styling tabel langsung keluar -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <!-- logo harddeck -->
        <div class="text-left mb-3">
            <img src="{{ asset('images/logo harddeck.png') }}" alt="Logo Perusahaan" class="img-fluid" style="max-height: 50px;">
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Dashboard Hasil Survei Pelanggan</h2>
        </div>

        <!-- Kartu Ringkasan -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <h6 class="text-muted fw-bold">Total Survei Masuk</h6>
                    <h3 class="fw-bold text-primary mb-0">{{ $totalSurvey ?? 0 }}</h3>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <h6 class="text-muted fw-bold">Rata-rata Rating</h6>
                    <h3 class="fw-bold text-warning mb-0">★ {{ number_format($avgRating ?? 0, 1) }}</h3>
                </div>
            </div>
        </div>

        <!-- Tabel Utama -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Daftar Hasil Survei</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="ps-3">No</th>
                                <th>Nama Lengkap</th>
                                <th>Kontak WhatsApp</th>
                                <th>Email</th>
                                <th>Sosial Media</th>
                                <th>Rating</th>
                                <th>Masukan / Saran</th>
                                <th>Tanggal Kirim</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($surveys) && count($surveys) > 0)
                                @foreach($surveys as $index => $survey)
                                    <tr>
                                        <td class="ps-3 fw-bold">{{ $surveys->firstItem() + $index }}</td>
                                        <td>{{ $survey->nama_lengkap ?? '-' }}</td>
                                        <td>{{ $survey->no_whatsapp ?? '-' }}</td>
                                        <td>{{ $survey->email ?? '-' }}</td>
                                        <td>{{ $survey->sosialmedia ?? '-' }}</td>
                                        <td>
                                            <span class="badge bg-warning text-dark">
                                                ★ {{ $survey->rating ?? 0 }}
                                            </span>
                                        </td>
                                        <td>{{ $survey->masukan_saran ?? '-' }}</td>
                                        <td class="small text-muted">
                                            {{ $survey->created_at ? $survey->created_at->format('d/m/Y H:i') : '-' }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">
                                        Data tabel belum tersedia atau $surveys kosong.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @if(isset($surveys) && $surveys->hasPages())
                <div class="card-footer bg-white py-3">
                    {{ $surveys->links() }}
                </div>
            @endif
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1.5rem; margin-bottom: 1rem;">
    <!-- Tombol Export PDF (Kiri) -->
    <div>
        <a href="{{ route('survey.export.pdf') }}" class="btn btn-primary">Export PDF</a>
    </div>

    <!-- Tombol Logout (Kanan) -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="background-color: #811010; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">
            Logout
        </button>
    </form>
    </div>
    </div>
</body>
</html>