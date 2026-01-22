<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Layanan Servis Kendaraan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5 mb-5">

        <!-- Header -->
        <div class="text-center mb-4">
            <h3 class="fw-bold">Form Servis Kendaraan</h3>
            <p class="text-muted">Silakan isi data kendaraan untuk melakukan servis</p>
        </div>

        <!-- Quote (opsional dari API) -->
        @if(isset($quote))
            <div class="card mb-4 shadow border-0" style="background:#0dcaf0;color:#083344;">
                <div class="card-body text-center">
                    <h5 class="mb-3 fw-bold">📌 Quote Hari Ini</h5>

                    <p class="fs-5 fst-italic mb-3">
                        “{{ $quote['text'] }}”
                    </p>

                    <div class="fw-semibold">
                        — {{ $quote['author'] ?? 'Anonim' }}
                    </div>
                </div>
            </div>
        @endif


        <!-- Alert sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Publik -->
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="/service/public">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Plat Nomor</label>
                        <input type="text" name="plat" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Kendaraan</label>
                        <input type="text" name="jenis" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipe Servis</label>
                        <input type="text" name="tipe_service" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Biaya</label>
                            <input type="number" name="biaya" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">KM Kendaraan</label>
                            <input type="number" name="km" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Servis</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>

                    <button class="btn btn-success w-100">
                        Kirim Data Servis
                    </button>
                </form>
            </div>
        </div>

        <!-- Login Admin -->
        <div class="text-center mt-4">
            <a href="/login" class="text-decoration-none">
                Login sebagai Admin
            </a>
        </div>

    </div>

</body>

</html>