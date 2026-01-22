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

</html>