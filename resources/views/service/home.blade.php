<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Layanan Servis Kendaraan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 800px;
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .header-section {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .header-icon {
            font-size: 48px;
            color: #4361ee;
            margin-bottom: 15px;
        }

        .main-title {
            color: #2b2d42;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #6c757d;
            font-size: 1.1rem;
        }

        .quote-card {
            background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
            color: white;
            border-radius: 15px;
            margin-bottom: 30px;
            border: none;
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
        }

        .quote-body {
            padding: 25px;
        }

        .quote-text {
            font-style: italic;
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .quote-author {
            font-weight: 600;
            text-align: right;
        }

        .form-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .form-header {
            background: #f8f9fa;
            padding: 20px;
            border-bottom: 2px solid #e9ecef;
        }

        .form-title {
            color: #2b2d42;
            font-weight: 700;
            margin: 0;
        }

        .form-body {
            padding: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #4361ee;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        .input-group-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .input-icon+input {
            padding-left: 45px;
        }

        .submit-btn {
            background: linear-gradient(to right, #06d6a0, #05b888);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 15px rgba(6, 214, 160, 0.3);
        }

        .alert-success {
            border-radius: 10px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }

        .login-section {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .login-link {
            color: #4361ee;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border: 2px solid #4361ee;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .login-link:hover {
            background: #4361ee;
            color: white;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header-section">
            <div class="header-icon">🚗</div>
            <h1 class="main-title">Layanan Servis Kendaraan</h1>
            <p class="subtitle">Isi form di bawah untuk mengajukan servis kendaraan Anda</p>
        </div>

        <!-- Quote -->
        @if(isset($quote))
            <div class="card quote-card">
                <div class="quote-body">
                    <h5 class="mb-3 fw-bold">📌 Quote Hari Ini</h5>
                    <p class="quote-text">"{{ $quote['text'] }}"</p>
                    <div class="quote-author">
                        — {{ $quote['author'] ?? 'Anonim' }}
                    </div>
                </div>
            </div>
        @endif

        <!-- Alert sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Publik -->
        <div class="form-card">
            <div class="form-header">
                <h3 class="form-title">Form Servis Kendaraan</h3>
            </div>
            <div class="form-body">
                <form method="POST" action="/service/public">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label">Plat Nomor</label>
                        <div class="input-group-icon">
                            <span class="input-icon">🚘</span>
                            <input type="text" name="plat" class="form-control" placeholder="B 1234 ABC" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jenis Kendaraan</label>
                        <div class="input-group-icon">
                            <span class="input-icon">🚙</span>
                            <input type="text" name="jenis" class="form-control" placeholder="Contoh: Toyota Avanza"
                                required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Tipe Servis</label>
                        <div class="input-group-icon">
                            <span class="input-icon">🔧</span>
                            <input type="text" name="tipe_service" class="form-control"
                                placeholder="Contoh: Servis rutin" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Biaya (Rp)</label>
                            <div class="input-group-icon">
                                <span class="input-icon">💰</span>
                                <input type="number" name="biaya" class="form-control" placeholder="500000" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">KM Kendaraan</label>
                            <div class="input-group-icon">
                                <span class="input-icon">📊</span>
                                <input type="number" name="km" class="form-control" placeholder="15000" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Tanggal Servis</label>
                        <div class="input-group-icon">
                            <span class="input-icon">📅</span>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                    </div>

                    <button class="submit-btn">
                        📤 Kirim Data Servis
                    </button>
                </form>
            </div>
        </div>

        <!-- Login Admin -->
        <div class="login-section">
            <p class="mb-3 text-muted">Akses panel administrator untuk mengelola data servis</p>
            <a href="/login" class="login-link">
                🔐 Login sebagai Admin
            </a>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Layanan Servis Kendaraan</p>
        </div>
    </div>

    <script>
        // Set tanggal default ke hari ini
        document.addEventListener('DOMContentLoaded', function () {
            const dateInput = document.querySelector('input[name="tanggal"]');
            if (dateInput) {
                const today = new Date().toISOString().split('T')[0];
                dateInput.value = today;
                dateInput.max = today;
            }

            // Auto capitalize plat number
            const platInput = document.querySelector('input[name="plat"]');
            if (platInput) {
                platInput.addEventListener('input', function () {
                    this.value = this.value.toUpperCase();
                });
            }

            // Auto hide alert after 5 seconds
            const alertEl = document.querySelector('.alert-success');
            if (alertEl) {
                setTimeout(() => {
                    alertEl.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</body>

</html>

{{--
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

</html> --}}