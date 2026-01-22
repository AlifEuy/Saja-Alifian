<!DOCTYPE html>
<html>

<head>
    <title>Input Service</title>
</head>

<body>

    <h2>Input Data Service Kendaraan</h2>

    <input id="plat" placeholder="Plat Nomor"><br><br>
    <input id="jenis" placeholder="Jenis Kendaraan"><br><br>
    <input id="tipe_service" placeholder="Tipe Service"><br><br>
    <input id="biaya" type="number" placeholder="Biaya"><br><br>
    <input id="km" type="number" placeholder="KM"><br><br>
    <input id="tanggal" type="date"><br><br>

    <button onclick="simpan()">Simpan</button>

    <script>
        function simpan() {
            fetch('/api/service', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    plat: document.getElementById('plat').value,
                    jenis: document.getElementById('jenis').value,
                    tipe_service: document.getElementById('tipe_service').value,
                    biaya: Number(document.getElementById('biaya').value),
                    km: Number(document.getElementById('km').value),
                    tanggal: document.getElementById('tanggal').value
                })
            })
                .then(res => res.text())
                .then(data => alert(data))
                .catch(err => alert('Fetch error'));
        }
    </script>

    </script>


    </script>

</body>

</html>