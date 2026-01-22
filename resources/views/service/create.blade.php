<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Servis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a0ca3;
            --secondary: #4cc9f0;
            --success: #06d6a0;
            --warning: #ffd166;
            --danger: #ef476f;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 20px;
        }
        
        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .main-card {
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 30px;
            border: none;
        }
        
        .card-header-custom {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            padding: 25px 30px;
            border-bottom: none;
            position: relative;
            overflow: hidden;
        }
        
        .card-header-custom::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(30px, -30px);
        }
        
        .header-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .header-subtitle {
            font-size: 0.95rem;
            opacity: 0.9;
            margin-top: 5px;
            margin-left: 40px;
        }
        
        .card-body-custom {
            padding: 30px;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .form-label i {
            color: var(--primary);
        }
        
        .form-control-custom {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 12px 15px;
            font-size: 16px;
            transition: var(--transition);
            background-color: white;
        }
        
        .form-control-custom:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
            outline: none;
        }
        
        .input-group-icon {
            position: relative;
        }
        
        .input-group-icon .form-control-custom {
            padding-left: 45px;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            z-index: 5;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .form-grid .mb-3 {
            margin-bottom: 0;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        
        .back-btn {
            background: white;
            color: var(--gray);
            border: 2px solid #e0e0e0;
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
            flex: 1;
            min-width: 150px;
            justify-content: center;
        }
        
        .back-btn:hover {
            background: #f8f9fa;
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-2px);
            text-decoration: none;
        }
        
        .submit-btn {
            background: linear-gradient(to right, var(--success), #05b888);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            flex: 2;
            min-width: 200px;
        }
        
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(6, 214, 160, 0.3);
        }
        
        .submit-btn:active {
            transform: translateY(0);
        }
        
        .quote-card {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }
        
        .quote-card::before {
            content: """;
            position: absolute;
            top: -20px;
            left: 10px;
            font-size: 100px;
            font-family: Georgia, serif;
            color: rgba(255, 255, 255, 0.1);
        }
        
        .quote-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .quote-icon {
            font-size: 20px;
            background: rgba(255, 255, 255, 0.2);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .quote-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0;
        }
        
        .quote-text {
            font-size: 1.1rem;
            font-style: italic;
            line-height: 1.6;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }
        
        .quote-author {
            font-weight: 500;
            text-align: right;
            font-size: 0.95rem;
            opacity: 0.9;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .button-group {
                flex-direction: column;
            }
            
            .back-btn, .submit-btn {
                width: 100%;
                flex: none;
            }
            
            .card-body-custom {
                padding: 20px;
            }
            
            .card-header-custom {
                padding: 20px;
            }
        }
        
        /* Loading state */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }
        
        .loading-spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Alert styles */
        .alert-custom {
            position: fixed;
            top: 20px;
            right: 20px;
            min-width: 300px;
            max-width: 400px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            z-index: 1000;
            display: none;
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <!-- Alert Notification (Hidden by default) -->
        <div id="alertNotification" class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-3" style="font-size: 1.5rem;"></i>
                <div>
                    <h6 class="alert-heading mb-1">Berhasil!</h6>
                    <p class="mb-0" id="alertMessage">Data berhasil disimpan</p>
                </div>
            </div>
            <button type="button" class="btn-close" onclick="hideAlert()"></button>
        </div>
        
        <!-- Quote Card -->
        @if(isset($quote))
            <div class="quote-card">
                <div class="quote-header">
                    <div class="quote-icon">
                        <i class="bi bi-chat-quote"></i>
                    </div>
                    <h5 class="quote-title">Quote Hari Ini</h5>
                </div>
                <p class="quote-text">"{{ $quote['text'] }}"</p>
                <div class="quote-author">
                    — {{ $quote['author'] ?? 'Anonim' }}
                </div>
            </div>
        @endif

        <!-- Main Form Card -->
        <div class="main-card">
            <div class="card-header-custom">
                <h1 class="header-title">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Data Servis Kendaraan
                </h1>
                <p class="header-subtitle">Lengkapi form di bawah untuk menambahkan data servis baru</p>
            </div>

            <div class="card-body-custom">
                <!-- FORM PUBLIK -->
                <form id="publicForm" method="POST" action="/service">
                    @csrf

                    <div class="form-grid">
                        <div class="mb-4">
                            <label class="form-label">
                                <i class="bi bi-123"></i>
                                Plat Nomor
                            </label>
                            <div class="input-group-icon">
                                <i class="bi bi-tag input-icon"></i>
                                <input type="text" name="plat" class="form-control-custom" placeholder="B 1234 ABC" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                <i class="bi bi-car-front"></i>
                                Jenis Kendaraan
                            </label>
                            <div class="input-group-icon">
                                <i class="bi bi-truck input-icon"></i>
                                <input type="text" name="jenis" class="form-control-custom" placeholder="Toyota Avanza" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-wrench"></i>
                            Tipe Servis
                        </label>
                        <div class="input-group-icon">
                            <i class="bi bi-tools input-icon"></i>
                            <input type="text" name="tipe_service" class="form-control-custom" placeholder="Servis rutin, ganti oli, perbaikan rem" required>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="mb-4">
                            <label class="form-label">
                                <i class="bi bi-cash-coin"></i>
                                Biaya (Rp)
                            </label>
                            <div class="input-group-icon">
                                <i class="bi bi-currency-exchange input-icon"></i>
                                <input type="number" name="biaya" class="form-control-custom" placeholder="500000" required min="0">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                <i class="bi bi-speedometer2"></i>
                                KM Kendaraan
                            </label>
                            <div class="input-group-icon">
                                <i class="bi bi-signpost input-icon"></i>
                                <input type="number" name="km" class="form-control-custom" placeholder="15000" required min="0">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            <i class="bi bi-calendar-date"></i>
                            Tanggal Servis
                        </label>
                        <div class="input-group-icon">
                            <i class="bi bi-calendar3 input-icon"></i>
                            <input type="date" name="tanggal" class="form-control-custom" required>
                        </div>
                    </div>

                    <div class="button-group">
                        @if (request()->is('service/create'))
                            <a href="/dashboard" class="back-btn">
                                <i class="bi bi-arrow-left"></i>
                                Kembali ke Dashboard
                            </a>
                        @endif

                        <button type="submit" class="submit-btn" id="submitBtn">
                            <i class="bi bi-check-lg"></i>
                            <span id="submitText">Simpan Data Servis</span>
                            <div class="loading-spinner" id="loadingSpinner" style="display:none;"></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Alert functions
        function showAlert(message, type = 'success') {
            const alertEl = document.getElementById('alertNotification');
            const alertMsg = document.getElementById('alertMessage');
            
            alertEl.className = `alert alert-${type} alert-custom alert-dismissible fade show`;
            alertMsg.textContent = message;
            
            if (type === 'success') {
                alertEl.querySelector('i').className = 'bi bi-check-circle-fill me-3';
            } else {
                alertEl.querySelector('i').className = 'bi bi-exclamation-circle-fill me-3';
            }
            
            alertEl.style.display = 'block';
            
            // Auto hide after 5 seconds
            setTimeout(hideAlert, 5000);
        }
        
        function hideAlert() {
            document.getElementById('alertNotification').style.display = 'none';
        }
        
        // Form submission logic (LOGIKA ASLI TIDAK DIUBAH)
        document.getElementById('publicForm').addEventListener('submit', function (e) {
            const isAdminPage = window.location.pathname === '/service/create';
            
            // Show loading state
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            
            submitText.textContent = 'Menyimpan...';
            loadingSpinner.style.display = 'inline-block';
            submitBtn.classList.add('loading');
            
            // =========================
            // ADMIN → SUBMIT NORMAL
            // =========================
            if (isAdminPage) {
                // Biarkan form submit normal, loading akan hilang saat page reload
                return true;
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
                // Show success alert
                showAlert(data.message, 'success');
                
                // Reset form
                form.reset();
                
                // Reset button state
                resetButtonState();
            })
            .catch(() => {
                // Show error alert
                showAlert('Gagal menyimpan data. Silakan coba lagi.', 'danger');
                resetButtonState();
            });
        });
        
        function resetButtonState() {
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            
            submitText.textContent = 'Simpan Data Servis';
            loadingSpinner.style.display = 'none';
            submitBtn.classList.remove('loading');
        }
        
        // Set today's date as default
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.querySelector('input[name="tanggal"]');
            if (dateInput) {
                const today = new Date().toISOString().split('T')[0];
                dateInput.value = today;
                dateInput.max = today;
            }
            
            // Auto capitalize plat number
            const platInput = document.querySelector('input[name="plat"]');
            if (platInput) {
                platInput.addEventListener('input', function() {
                    this.value = this.value.toUpperCase();
                });
            }
            
            // Add animation to form inputs
            const formInputs = document.querySelectorAll('.form-control-custom');
            formInputs.forEach((input, index) => {
                input.style.opacity = '0';
                input.style.transform = 'translateY(10px)';
                
                setTimeout(() => {
                    input.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    input.style.opacity = '1';
                    input.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>

{{-- <!DOCTYPE html>
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

</html> --}}