<?php
include "config/koneksi.php";

if (isset($_POST['create'])) {
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $angkatan = $_POST["angkatan"];
    $prodi = $_POST["prodi"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];

    $kendaraan = isset($_POST["kendaraan"]) ? implode(", ", $_POST["kendaraan"]) : "";

    $q_input = "INSERT INTO tb_form VALUES ('$nama', '$nim', '$angkatan', '$prodi', '$jenis_kelamin', '$kendaraan', '$alamat', '$telp', '$email')";

    $sql = mysqli_query($conn, $q_input);

    if (!$sql) {
        echo "<script type='text/javascript'>alert('Data gagal disimpan!');</script>" . mysqli_error($conn);
    }
}

if (isset($_POST['edit'])) {
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $angkatan = $_POST["angkatan"];
    $prodi = $_POST["prodi"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];

    $kendaraan = isset($_POST["kendaraan"]) ? implode(", ", $_POST["kendaraan"]) : "";

    $q_edit = "UPDATE tb_form SET nim = '$nim', nama = '$nama', angkatan = '$angkatan', program_studi = '$prodi', jenis_kelamin = '$jenis_kelamin', kendaraan = '$kendaraan', alamat = '$alamat', no_telp = '$telp', email = '$email' WHERE nim = '$nim'";

    $exec = mysqli_query($conn, $q_edit);
    if (!$exec) {
        echo "<script type='text/javascript'>alert('Data gagal diedit!');</script>" . mysqli_error($conn);
    }
}

if (isset($_POST['hapus'])) {
    $nim = $_POST['nim'];
    $q_hapus = "DELETE FROM tb_form WHERE nim = '$nim'";
    $ex_hapus = mysqli_query($conn, $q_hapus);
    if (!$ex_hapus) {
        echo "<script type='text/javascript'>alert('Data gagal dihapus!');</script>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Formulir</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="validasi.js"></script>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class="jumbotron" style="min-height: 50rem;">
        <div class="container py-5 w-50">
            <div class="col-md">
                <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                        <h3 class="h2 text-black mb-3" style="text-align: center;">DATA DIRI MAHASISWA</h3>
                        <hr>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "config/koneksi.php";
                                $ambildataform = mysqli_query($conn, "SELECT * FROM tb_form");
                                $i = 1;
                                while ($form = mysqli_fetch_array($ambildataform)) {
                                    $nama = $form['nama'];
                                    $nim = $form['nim'];
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $nama; ?></td>
                                        <td><?= $nim; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" name="input" data-bs-toggle="modal" data-bs-target="#detailModal<?php echo $form['nim'] ?>">Detail</button>
                                            <button type="button" class="btn btn-warning" name="input" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $form['nim'] ?>">Edit</button>
                                            <button type="button" class="btn btn-danger" name="input" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo $form['nim'] ?>">Hapus</button>
                                        </td>
                                    </tr>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="detailModal<?php echo $form['nim'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Nama</label>
                                <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $form['nama'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">NIM</label>
                                <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $form['nim'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Angkatan</label>
                                <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $form['angkatan'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Program Studi</label>
                                <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $form['program_studi'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Jenis Kelamin</label>
                                <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $form['jenis_kelamin'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Kendaraan</label>
                                <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $form['kendaraan'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Alamat</label>
                                <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $form['alamat'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">No Telepon</label>
                                <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $form['no_telp'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Email</label>
                                <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $form['email'] ?>" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editModal<?php echo $form['nim'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel">Edit Formulir</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form onsubmit="return validateForm()" method="post" action="">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" value="<?php echo $form['nama'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $form['nim'] ?>" readonly>
                                </div>
                                <label for="angkatan" class="form-label">Angkatan</label>
                                <select class="mb-3 form-select" id="angkatan" name="angkatan">
                                    <option selected hidden>
                                        <?php echo $form['angkatan'] ?>
                                    </option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>
                                <label for="prodi" class="form-label">Program Studi</label>
                                <select class="mb-3 form-select" id="prodi" name="prodi">
                                    <option selected hidden>
                                        <?php echo $form['program_studi'] ?>
                                    </option>
                                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                    <option value="Teknik Industri">Teknik Industri</option>
                                    <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                                    <option value="Teknik Mesin">Teknik Mesin</option>
                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                </select>
                                Jenis Kelamin
                                <div class="mt-2 form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-Laki" <?php if ($form['jenis_kelamin'] == 'Laki-Laki') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                    <label class="form-check-label" for="laki-laki">
                                        Laki - Laki
                                    </label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" <?php if ($form['jenis_kelamin'] == 'Perempuan') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                    <label class="form-check-label" for="perempuan">
                                        Perempuan
                                    </label>
                                </div>
                                Kendaraan
                                <div class="mt-2 form-check">
                                    <input class="form-check-input" type="checkbox" name="kendaraan[]" id="motor" value="Motor" <?php if ($form['kendaraan'] == 'Motor' || $form['kendaraan'] == 'Motor, Mobil') {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                    <label class="form-check-label" for="motor">
                                        Motor
                                    </label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input class="form-check-input" type="checkbox" name="kendaraan[]" id="mobil" value="Mobil" <?php if ($form['kendaraan'] == 'Mobil' || $form['kendaraan'] == 'Motor, Mobil') {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                    <label class="form-check-label" for="mobil">
                                        Mobil
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $form['alamat'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $form['no_telp'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo $form['email'] ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" name="edit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="hapusModal<?php echo $form['nim'] ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="hapusModalLabel">PERHATIAN!!!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <h3>Apakah Anda Yakin Ingin Menghapus 
                                    <?php echo $form['nama'] ?>?
                                </h3>
                                <input type="hidden" value="<?php echo $form['nim'] ?>" name="nim">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
                                }
        ?>
        </tbody>
        </table>
        <a href="index.html" class="btn btn-secondary card-link mt-3">Kembali</a>
        </div>
    </div>
    <script src="config/validasi.js"></script>
</body>

</html>