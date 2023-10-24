<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Hasil Submit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="card col-12 m-auto mt-5 w-75 shadow p-3 bg-body rounded" style="width: 40rem;">
        <div class="card-body">
            <h5 class="card-title">Data Input Formulir</h5>
            <p class="card-text"><strong>Nama:</strong> {{ $nama }}</p>
            <p class="card-text"><strong>NIM:</strong> {{ $nim }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $angkatan }}</p>
            <p class="card-text"><strong>Program Studi:</strong> {{ $prodi }}</p>
            <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $jenis_kelamin }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $alamat }}</p>
            <p class="card-text"><strong>No Telepon:</strong> {{ $telp }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $email }}</p>
        </div>
    </div>
</body>
</html>