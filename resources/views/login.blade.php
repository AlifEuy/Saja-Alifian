<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Servis Kendaraan</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Firebase v8 -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>

    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a0ca3;
            --secondary: #4cc9f0;
            --success: #06d6a0;
            --danger: #ef476f;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
        }

        .login-header {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-header::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1%, transparent 1%);
            background-size: 20px 20px;
            opacity: 0.3;
        }

        .logo-container {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .logo-icon {
            font-size: 40px;
        }

        .login-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .login-subtitle {
            font-size: 14px;
            opacity: 0.9;
            font-weight: 400;
        }

        .login-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
            font-size: 14px;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            z-index: 5;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            transition: var(--transition);
            background-color: white;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
            outline: none;
        }

        .form-control.error {
            border-color: var(--danger);
        }

        .error-message {
            color: var(--danger);
            font-size: 13px;
            margin-top: 5px;
            display: none;
        }

        .login-btn {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 15px rgba(67, 97, 238, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .login-footer {
            text-align: center;
            padding: 20px 30px 30px;
            color: var(--gray);
            font-size: 14px;
            border-top: 1px solid #eee;
        }

        .login-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .loading-spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s linear infinite;
            display: none;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .alert-message {
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            display: none;
        }

        .alert-danger {
            background-color: rgba(239, 71, 111, 0.1);
            color: var(--danger);
            border-left: 4px solid var(--danger);
        }

        .alert-success {
            background-color: rgba(6, 214, 160, 0.1);
            color: #06a17a;
            border-left: 4px solid var(--success);
        }

        @media (max-width: 480px) {
            .login-card {
                border-radius: 15px;
            }

            .login-header {
                padding: 25px 20px;
            }

            .login-body {
                padding: 25px 20px;
            }

            .logo-container {
                width: 70px;
                height: 70px;
            }

            .logo-icon {
                font-size: 35px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="logo-container">
                    <i class="bi bi-shield-lock logo-icon"></i>
                </div>
                <h1 class="login-title">Login Admin</h1>
                <p class="login-subtitle">Dashboard Servis Kendaraan</p>
            </div>

            <!-- Alert Message -->
            <div id="alertMessage" class="alert-message alert-danger">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <span id="alertText"></span>
            </div>

            <!-- Login Form -->
            <div class="login-body">
                <div class="form-group">
                    <label class="form-label" for="email">
                        <i class="bi bi-envelope me-1"></i> Email
                    </label>
                    <div class="input-group">
                        <i class="bi bi-person-circle input-icon"></i>
                        <input type="email" id="email" class="form-control" placeholder="admin@example.com"
                            autocomplete="email">
                    </div>
                    <div class="error-message" id="emailError">Email tidak valid</div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">
                        <i class="bi bi-key me-1"></i> Password
                    </label>
                    <div class="input-group">
                        <i class="bi bi-lock input-icon"></i>
                        <input type="password" id="password" class="form-control" placeholder="Masukkan password"
                            autocomplete="current-password">
                    </div>
                    <div class="error-message" id="passwordError">Password harus diisi</div>
                </div>

                <button onclick="login()" class="login-btn" id="loginButton">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span id="loginText">Masuk ke Dashboard</span>
                    <div class="loading-spinner" id="loginSpinner"></div>
                </button>
            </div>

            <!-- Footer -->
            <div class="login-footer">
                <p>Hanya untuk administrator sistem. <br>Hubungi developer jika lupa kredensial.</p>
            </div>
        </div>
    </div>

    <script>
        // Firebase config (TIDAK DIUBAH)
        var firebaseConfig = {
            apiKey: "AIzaSyAD0SMqWgeVlSfnei28OsdvdqS01_RS07I",
            authDomain: "apkcc-1ec07.firebaseapp.com",
            projectId: "apkcc-1ec07",
        };

        // INIT FIREBASE (TIDAK DIUBAH)
        firebase.initializeApp(firebaseConfig);

        // Fungsi login (LOGIKA TIDAK DIUBAH, hanya ditambahkan UI enhancements)
        function login() {
            // Reset error states
            resetErrors();
            hideAlert();

            let email = document.getElementById('email').value.trim();
            let password = document.getElementById('password').value.trim();

            // Validasi input
            let isValid = true;

            if (!email) {
                showError('email', 'Email harus diisi');
                isValid = false;
            } else if (!validateEmail(email)) {
                showError('email', 'Format email tidak valid');
                isValid = false;
            }

            if (!password) {
                showError('password', 'Password harus diisi');
                isValid = false;
            } else if (password.length < 6) {
                showError('password', 'Password minimal 6 karakter');
                isValid = false;
            }

            if (!isValid) {
                showAlert('Harap perbaiki kesalahan di atas', 'danger');
                return;
            }

            // Show loading state
            setLoading(true);

            // LOGIKA LOGIN TIDAK DIUBAH
            firebase.auth()
                .signInWithEmailAndPassword(email, password)
                .then(() => {
                    // set session admin di Laravel
                    return fetch('/set-admin-session', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
                })
                .then(() => {
                    // Show success message
                    showAlert('Login berhasil! Mengalihkan...', 'success');

                    // Redirect after short delay
                    setTimeout(() => {
                        window.location.href = '/dashboard';
                    }, 1000);
                })
                .catch(err => {
                    setLoading(false);

                    // Show appropriate error message
                    let errorMessage = 'Login gagal. ';

                    if (err.code === 'auth/user-not-found' || err.code === 'auth/wrong-password') {
                        errorMessage += 'Email atau password salah.';
                    } else if (err.code === 'auth/too-many-requests') {
                        errorMessage += 'Terlalu banyak percobaan gagal. Coba lagi nanti.';
                    } else {
                        errorMessage += err.message;
                    }

                    showAlert(errorMessage, 'danger');
                });
        }

        // Helper functions untuk UI (tidak mengubah logika login)
        function showError(fieldId, message) {
            const field = document.getElementById(fieldId);
            const errorEl = document.getElementById(fieldId + 'Error');

            if (field && errorEl) {
                field.classList.add('error');
                errorEl.textContent = message;
                errorEl.style.display = 'block';
            }
        }

        function resetErrors() {
            document.querySelectorAll('.form-control').forEach(el => {
                el.classList.remove('error');
            });

            document.querySelectorAll('.error-message').forEach(el => {
                el.style.display = 'none';
            });
        }

        function showAlert(message, type) {
            const alertEl = document.getElementById('alertMessage');
            const alertText = document.getElementById('alertText');

            if (alertEl && alertText) {
                alertText.textContent = message;

                // Update alert class
                alertEl.className = 'alert-message';
                if (type === 'danger') {
                    alertEl.classList.add('alert-danger');
                    alertEl.innerHTML = `<i class="bi bi-exclamation-triangle-fill me-2"></i> <span id="alertText">${message}</span>`;
                } else if (type === 'success') {
                    alertEl.classList.add('alert-success');
                    alertEl.innerHTML = `<i class="bi bi-check-circle-fill me-2"></i> <span id="alertText">${message}</span>`;
                }

                alertEl.style.display = 'block';
            }
        }

        function hideAlert() {
            const alertEl = document.getElementById('alertMessage');
            if (alertEl) {
                alertEl.style.display = 'none';
            }
        }

        function setLoading(isLoading) {
            const loginBtn = document.getElementById('loginButton');
            const loginText = document.getElementById('loginText');
            const loginSpinner = document.getElementById('loginSpinner');

            if (isLoading) {
                loginBtn.disabled = true;
                loginText.textContent = 'Memproses...';
                loginSpinner.style.display = 'inline-block';
            } else {
                loginBtn.disabled = false;
                loginText.textContent = 'Masuk ke Dashboard';
                loginSpinner.style.display = 'none';
            }
        }

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Allow login with Enter key
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('email').addEventListener('keypress', function (e) {
                if (e.key === 'Enter') login();
            });

            document.getElementById('password').addEventListener('keypress', function (e) {
                if (e.key === 'Enter') login();
            });

            // Focus on email field on page load
            document.getElementById('email').focus();
        });
    </script>
</body>

{{-- </html>

<!DOCTYPE html>
<html>

<head>
    <title>Login Admin</title>

    <!-- Firebase v8 -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
</head>

<body>

    <h2>Login Admin</h2>

    <input type="email" id="email" placeholder="Email"><br><br>
    <input type="password" id="password" placeholder="Password"><br><br>

    <button onclick="login()">Login</button>

    <script>
        // Firebase config
        var firebaseConfig = {
            apiKey: "AIzaSyAD0SMqWgeVlSfnei28OsdvdqS01_RS07I",
            authDomain: "apkcc-1ec07.firebaseapp.com",
            projectId: "apkcc-1ec07",
        };

        // INIT FIREBASE
        firebase.initializeApp(firebaseConfig);

        function login() {
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;

            firebase.auth()
                .signInWithEmailAndPassword(email, password)
                .then(() => {
                    // set session admin di Laravel
                    return fetch('/set-admin-session', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
                })
                .then(() => {
                    window.location.href = '/dashboard';
                })
                .catch(err => alert(err.message));
        }
    </script>

</body>

</html> --}}