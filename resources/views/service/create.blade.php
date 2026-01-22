<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Servis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5>Tambah Data Servis Kendaraan</h5>
            </div>

            <div class="card-body">

                <!-- FORM PUBLIK -->
                <form id="publicForm" method="POST" action="/service">
                    @csrf

                    <div class="mb-3">
                        <label>Plat Nomor</label>
                        <input type="text" name="plat" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Jenis Kendaraan</label>
                        <input type="text" name="jenis" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Tipe Servis</label>
                        <input type="text" name="tipe_service" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Biaya</label>
                        <input type="number" name="biaya" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>KM</label>
                        <input type="number" name="km" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Servis</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="d-flex gap-2">
                        @if (request()->is('service/create'))
                            <a href="/dashboard" class="btn btn-secondary">
                                ← Kembali
                            </a>
                        @endif

                        <button class="btn btn-success flex-fill">
                            Simpan
                        </button>
                    </div>
                </form>

            </div>

            @if(isset($quote))
                <div class="card mb-4 shadow" style="background:#0d6efd;color:white;">
                    <div class="card-body text-center">
                        <h5 class="mb-3">📌 Quote Hari Ini</h5>
                        <blockquote class="blockquote mb-0">
                            <p>"{{ $quote['text'] }}"</p>
                            <footer class="blockquote-footer text-white mt-2">
                                {{ $quote['author'] ?? 'Anonim' }}
                            </footer>
                        </blockquote>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <script>
        document.getElementById('publicForm').addEventListener('submit', function (e) {

            const isAdminPage = window.location.pathname === '/service/create';

            // =========================
            // ADMIN → SUBMIT NORMAL
            // =========================
            if (isAdminPage) {
                return; // biarkan form jalan ke /service
            }

            // =========================
            // PUBLIK → AJAX
            // =========================
            e.preventDefault();

            let form = document.getElementById('publicForm');
            let formData = new FormData(form);

            fetch('/service/public', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    form.reset();
                })
                .catch(() => {
                    alert('Gagal menyimpan data');
                });
        });
    </script>


</body>

</html>