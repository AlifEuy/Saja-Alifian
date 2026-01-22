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
</html>
