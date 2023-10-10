<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Formulir</title>
</head>
<body>
    <h1>Hasil Formulir Data Diri</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data yang dikirimkan melalui formulir
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $angkatan = $_POST["angkatan"];
        $prodi = $_POST["prodi"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $alamat = $_POST["alamat"];
        $telp = $_POST["telp"];
        $email = $_POST["email"];
        
        // Mengambil data kendaraan yang dipilih
        $kendaraan = isset($_POST["kendaraan"]) ? $_POST["kendaraan"] : [];

        // Menampilkan hasil data
        echo "<p>Nama: $nama</p>";
        echo "<p>NIM: $nim</p>";
        echo "<p>Angkatan: $angkatan</p>";
        echo "<p>Program Studi: $prodi</p>";
        echo "<p>Jenis Kelamin: $jenis_kelamin</p>";
        echo "<p>Alamat: $alamat</p>";
        echo "<p>No Telepon: $telp</p>";
        echo "<p>Email: $email</p>";

        if (!empty($kendaraan)) {
            echo "<p>Kendaraan: " . implode(", ", $kendaraan) . "</p>";
        } else {
            echo "<p>Tidak ada kendaraan yang dipilih</p>";
        }
    } else {
        echo "<p>Formulir belum dikirim. Silakan kirim formulir terlebih dahulu.</p>";
    }
    ?>
</body>
</html>
