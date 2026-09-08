<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('evaluation.png') }}">
    <title>Survei Kepuasan Pelanggan</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome untuk Rating Bintang -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .rating-css input { display: none; }
        .rating-css label { font-size: 30px; color: #ddd; cursor: pointer; float: right; }
        .rating-css input:checked ~ label,
        .rating-css label:hover,
        .rating-css label:hover ~ label { color: #ffc107; }
        .rating-star { display: inline-block; direction: rtl; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-4">

                        <!-- logo harddeck -->
                        <div class="text-center mb-3">
                            <img src="{{ asset('images/logo harddeck.png') }}" alt="Logo Perusahaan" class="img-fluid" style="max-height: 100px;">
                        </div>
                    <h3 class="card-title text-center mb-4 text-dark">SURVEI KEPUASAN PELANGGAN</h3>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('survey.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap (Full Name)</label>
                            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}" required>
                            @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kontak WhatsApp</label>
                            <input type="text" name="no_whatsapp" class="form-control @error('no_whatsapp') is-invalid @enderror" placeholder="081234567890" value="{{ old('no_whatsapp') }}" required>
                            @error('no_whatsapp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sosial Media</label>
                            <input type="sosialmedia" name="sosialmedia" class="form-control @error('sosialmedia') is-invalid @enderror" value="{{ old('sosialmedia') }}" required>
                            @error('sosialmedia') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3 text-center">
                            <label class="form-label d-block">Rating Bintang</label>
                            <div class="rating-css rating-star">
                                <input type="radio" id="star5" name="rating" value="5"><label for="star5" class="fa fa-star"></label>
                                <input type="radio" id="star4" name="rating" value="4"><label for="star4" class="fa fa-star"></label>
                                <input type="radio" id="star3" name="rating" value="3"><label for="star3" class="fa fa-star"></label>
                                <input type="radio" id="star2" name="rating" value="2"><label for="star2" class="fa fa-star"></label>
                                <input type="radio" id="star1" name="rating" value="1"><label for="star1" class="fa fa-star"></label>
                            </div>
                            @error('rating') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Masukan / Saran (Feed Back)</label>
                            <textarea name="masukan_saran" class="form-control @error('masukan_saran') is-invalid @enderror" rows="4">{{ old('masukan_saran') }}</textarea>
                            @error('masukan_saran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">Kirim Survei</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>