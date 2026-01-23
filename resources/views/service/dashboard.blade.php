<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Servis Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --success-color: #4cc9f0;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --border-radius: 12px;
            --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .dashboard-header {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: var(--border-radius);
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--box-shadow);
            position: relative;
            overflow: hidden;
        }

        .dashboard-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(to right, #4cc9f0, #7209b7);
        }

        .header-title {
            font-weight: 700;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header-title i {
            font-size: 2rem;
        }

        .btn-primary-custom {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(67, 97, 238, 0.4);
        }

        .stats-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            border-left: 4px solid var(--primary-color);
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stats-count {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .stats-label {
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: 500;
        }

        .main-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .card-header-custom {
            background-color: white;
            border-bottom: 1px solid #eee;
            padding: 1.5rem;
            font-weight: 600;
            color: var(--dark-color);
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .table-container {
            overflow-x: auto;
        }

        .table-custom {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-custom thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            padding: 1rem;
            font-weight: 600;
            color: #495057;
            white-space: nowrap;
        }

        .table-custom tbody tr {
            transition: var(--transition);
        }

        .table-custom tbody tr:hover {
            background-color: #f8f9ff;
        }

        .table-custom tbody td {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        .badge-service {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .badge-routine {
            background-color: rgba(76, 201, 240, 0.1);
            color: #0a8ea8;
        }

        .badge-repair {
            background-color: rgba(255, 107, 107, 0.1);
            color: #d63031;
        }

        .badge-maintenance {
            background-color: rgba(72, 187, 120, 0.1);
            color: #27ae60;
        }

        .empty-state {
            padding: 3rem 1rem;
            text-align: center;
            color: #6c757d;
        }

        .empty-state-icon {
            font-size: 3rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }

        .logout-btn {
            background: linear-gradient(to right, #ff6b6b, #ee5a52);
            border: none;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(238, 90, 82, 0.3);
        }

        .alert-custom {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .footer {
            text-align: center;
            padding: 1.5rem;
            color: #6c757d;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .dashboard-header {
                padding: 1.2rem 1rem;
            }

            .header-title {
                font-size: 1.5rem;
            }

            .table-custom thead th,
            .table-custom tbody td {
                padding: 0.75rem;
            }
        }
    </style>
</head>

<body>

    <div class="dashboard-container p-3 p-md-4">
        <!-- Header -->
        <div class="dashboard-header">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <div class="header-title mb-3 mb-md-0">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard Servis Kendaraan
                </div>
                <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center gap-3">
                    <div class="text-white text-center text-md-end">
                        <div class="small">Total Servis</div>
                        <div class="h4 mb-0">{{ count($services) }}</div>
                    </div>
                    <a href="/service/create" class="btn btn-light btn-primary-custom d-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Servis
                    </a>
                </div>
            </div>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="stats-card">
                    <div class="stats-icon"
                        style="background-color: rgba(67, 97, 238, 0.1); color: var(--primary-color);">
                        <i class="bi bi-car-front"></i>
                    </div>
                    <div class="stats-count">
                        {{ count(array_unique(array_column($services, 'plat'))) }}
                    </div>
                    <div class="stats-label">Kendaraan Terdaftar</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card">
                    <div class="stats-icon"
                        style="background-color: rgba(76, 201, 240, 0.1); color: var(--success-color);">
                        <i class="bi bi-currency-exchange"></i>
                    </div>
                    <div class="stats-count">
                        Rp {{ number_format(array_sum(array_column($services, 'biaya'))) }}
                    </div>
                    <div class="stats-label">Total Biaya Servis</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card">
                    <div class="stats-icon" style="background-color: rgba(255, 193, 7, 0.1); color: #ffc107;">
                        <i class="bi bi-tools"></i>
                    </div>
                    <div class="stats-count">
                        {{ count($services) }}
                    </div>
                    <div class="stats-label">Total Servis</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card">
                    <div class="stats-icon" style="background-color: rgba(111, 66, 193, 0.1); color: #6f42c1;">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div class="stats-count">
                        {{ count($services) > 0 ? date('d M Y', strtotime($services[0]['tanggal'])) : '-' }}
                    </div>
                    <div class="stats-label">Servis Terbaru</div>
                </div>
            </div>
        </div>

        <!-- Main Content Card -->
        <div class="main-card">
            <div class="card-header-custom">
                <div>
                    <i class="bi bi-list-check me-2"></i>
                    Daftar Servis Kendaraan
                </div>
                <div class="text-muted small">
                    Terakhir diperbarui: {{ date('d M Y, H:i') }}
                </div>
            </div>

            <div class="table-container p-3">
                @if(count($services) > 0)
                    <table class="table table-custom">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Plat Kendaraan</th>
                                <th>Jenis Kendaraan</th>
                                <th>Tipe Servis</th>
                                <th>KM</th>
                                <th>Biaya</th>
                                <th>Tanggal Servis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($services as $service)
                                <tr>
                                    <td><span class="badge bg-light text-dark">{{ $no++ }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-truck me-2 text-primary"></i>
                                            <strong>{{ $service['plat'] }}</strong>
                                        </div>
                                    </td>
                                    <td>{{ $service['jenis'] }}</td>
                                    <td>
                                        @php
                                            $badgeClass = 'badge-routine';
                                            if (strpos(strtolower($service['tipe_service']), 'perbaikan') !== false) {
                                                $badgeClass = 'badge-repair';
                                            } elseif (strpos(strtolower($service['tipe_service']), 'perawatan') !== false) {
                                                $badgeClass = 'badge-maintenance';
                                            }
                                        @endphp
                                        <span class="badge-service {{ $badgeClass }}">
                                            {{ $service['tipe_service'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-muted">
                                            <i class="bi bi-speedometer2 me-1"></i>
                                            {{ number_format($service['km']) }} KM
                                        </span>
                                    </td>
                                    <td>
                                        <strong class="text-primary">Rp {{ number_format($service['biaya']) }}</strong>
                                    </td>
                                    <td>
                                        <i class="bi bi-calendar-event me-1 text-muted"></i>
                                        {{ $service['tanggal'] }}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editModal" onclick="openEditModal(
                                                        '{{ $service['plat'] }}',
                                                        '{{ $service['jenis'] }}',
                                                        '{{ $service['tipe_service'] }}',
                                                        '{{ $service['km'] }}',
                                                        '{{ $service['biaya'] }}',
                                                        '{{ $service['tanggal'] }}')">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <form action="/service/delete" method="POST" class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data servis ini?')">
                                            @csrf
                                            <input type="hidden" name="plat" value="{{ $service['plat'] }}">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i class="bi bi-clipboard-x"></i>
                        </div>
                        <h5 class="mb-2">Belum ada data servis</h5>
                        <p class="text-muted mb-3">Mulai dengan menambahkan data servis kendaraan pertama Anda</p>
                        <a href="/service/create" class="btn btn-primary-custom">
                            <i class="bi bi-plus-circle me-2"></i>
                            Tambah Servis Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Footer with Logout Button -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted small">
                &copy; {{ date('Y') }} Dashboard Servis Kendaraan. All rights reserved.
            </div>
            <button onclick="logout()" class="logout-btn">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>
        </div>
    </div>

    <!-- ================= MODAL EDIT SERVIS ================= -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <form method="POST" action="/service/update">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="bi bi-pencil-square me-2"></i>Edit Data Servis
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Plat Kendaraan</label>
                                <input type="text" name="plat" id="edit_plat" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Jenis Kendaraan</label>
                                <input type="text" name="jenis" id="edit_jenis" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Tipe Servis</label>
                                <input type="text" name="tipe_service" id="edit_tipe" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">KM</label>
                                <input type="number" name="km" id="edit_km" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Biaya</label>
                                <input type="number" name="biaya" id="edit_biaya" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Tanggal Servis</label>
                                <input type="date" name="tanggal" id="edit_tanggal" class="form-control" required>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="bi bi-save me-1"></i>Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>


    <!-- ================= END MODAL ================= -->


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>

    <script>
        // Firebase Configuration
        var firebaseConfig = {
            apiKey: "AIzaSyAD0SMqWgeVlSfnei28OsdvdqS01_RS07I",
            authDomain: "apkcc-1ec07.firebaseapp.com",
            projectId: "apkcc-1ec07",
        };

        if (!firebase.apps.length) {
            firebase.initializeApp(firebaseConfig);
        }

        // Logout Function
        function logout() {
            // Show confirmation dialog
            if (!confirm("Apakah Anda yakin ingin logout?")) {
                return;
            }

            // Logout dari Firebase
            firebase.auth().signOut().then(function () {
                // Hapus session admin di Laravel
                fetch('/logout', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                }).then(() => {
                    // Show success message before redirect
                    alert("Logout berhasil! Anda akan diarahkan ke halaman login.");
                    // Kembali ke halaman publik
                    window.location.href = "/";
                }).catch(error => {
                    console.error('Error:', error);
                    alert("Terjadi kesalahan saat logout. Silakan coba lagi.");
                });
            });
        }

        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function () {
            // Add animation to table rows
            const tableRows = document.querySelectorAll('.table-custom tbody tr');
            tableRows.forEach((row, index) => {
                row.style.opacity = '0';
                row.style.transform = 'translateY(10px)';

                setTimeout(() => {
                    row.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    row.style.opacity = '1';
                    row.style.transform = 'translateY(0)';
                }, index * 50);
            });

            // Auto-dismiss alert after 5 seconds
            const alertElement = document.querySelector('.alert');
            if (alertElement) {
                setTimeout(() => {
                    const alert = new bootstrap.Alert(alertElement);
                    alert.close();
                }, 5000);
            }
        });
        function openEditModal(plat, jenis, tipe, km, biaya, tanggal) {
            document.getElementById('edit_plat').value = plat;
            document.getElementById('edit_jenis').value = jenis;
            document.getElementById('edit_tipe').value = tipe;
            document.getElementById('edit_km').value = km;
            document.getElementById('edit_biaya').value = biaya;
            document.getElementById('edit_tanggal').value = tanggal;
        }

    </script>

</body>
{{--

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Servis Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h3>🚗 Dashboard Servis Kendaraan</h3>
            <a href="/service/create" class="btn btn-primary">+ Tambah Servis</a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Plat</th>
                            <th>Jenis</th>
                            <th>Tipe Servis</th>
                            <th>KM</th>
                            <th>Biaya</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($services as $service)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $service['plat'] }}</td>
                            <td>{{ $service['jenis'] }}</td>
                            <td>{{ $service['tipe_service'] }}</td>
                            <td>{{ $service['km'] }}</td>
                            <td>Rp {{ number_format($service['biaya']) }}</td>
                            <td>{{ $service['tanggal'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($no === 1)
                <p class="text-center text-muted">Belum ada data servis</p>
                @endif
            </div>
            <button onclick="logout()" class="btn btn-danger btn-sm">
                Logout
            </button>

        </div>


    </div>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>

    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyAD0SMqWgeVlSfnei28OsdvdqS01_RS07I",
            authDomain: "apkcc-1ec07.firebaseapp.com",
            projectId: "apkcc-1ec07",
        };

        if (!firebase.apps.length) {
            firebase.initializeApp(firebaseConfig);
        }

        function logout() {
            // Logout dari Firebase
            firebase.auth().signOut().then(function () {

                // Hapus session admin di Laravel
                fetch('/logout', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(() => {
                    // Kembali ke halaman publik
                    window.location.href = "/";
                });

            });
        }
    </script>


</body>

</html> --}}