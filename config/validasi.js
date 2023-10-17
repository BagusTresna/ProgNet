function validateForm() {
  // Validasi Kolom Nama (hanya huruf)
  var namaInput = document.getElementById('nama').value;
  if (!/^[A-Za-z\s]+$/.test(namaInput)) {
    alert('Kolom Nama hanya bisa menginput huruf.');
    return false;
  }

  // Validasi Kolom NIM (hanya angka, 10 digit)
  var nimInput = document.getElementById('nim').value;
  if (!/^\d{10}$/.test(nimInput)) {
    alert('Kolom NIM hanya bisa menginput angka dan harus terdiri dari 10 digit.');
    return false;
  }

  // Validasi Kolom Email (harus mengandung @)
  var emailInput = document.getElementById('email').value;
  if (!emailInput.includes('@')) {
    alert('Kolom Email harus mengandung simbol "@".');
    return false;
  }

  // Validasi Kolom No Telepon (hanya angka)
  var noHpInput = document.getElementById('telp').value;
  if (!/^\d+$/.test(noHpInput)) {
    alert('Kolom No Telepon hanya bisa menginput angka.');
    return false;
  }

  // Mengambil nilai dari form
  var nama = document.getElementById('nama').value;
  var nim = document.getElementById('nim').value;
  var angkatan = document.getElementById('angkatan').value;
  var prodi = document.getElementById('prodi').value;
  var jenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked').value;
  var alamat = document.getElementById('alamat').value;
  var noHp = document.getElementById('telp').value;
  var email = document.getElementById('email').value;

  // Mendapatkan nilai kendaraan yang dipilih
  var motorChecked = document.getElementById('motor').checked;
  var mobilChecked = document.getElementById('mobil').checked;
  var kendaraan = [];

  if (motorChecked) {
    kendaraan.push('Motor');
  }

  if (mobilChecked) {
    kendaraan.push('Mobil');
  }

  // Menampilkan data yang diinput
  var output = "Data yang akan di masukkan\n\n";
  output += "Nama: " + nama + "\n";
  output += "NIM: " + nim + "\n";
  output += "Angkatan: " + angkatan + "\n";
  output += "Program Studi: " + prodi + "\n";
  output += "Jenis Kelamin: " + jenisKelamin + "\n";
  output += "Alamat: " + alamat + "\n";
  output += "No Telepon: " + noHp + "\n";
  output += "Email: " + email + "\n";
  output += "Kendaraan: " + kendaraan.join(', ') + "\n"; // Menggabungkan kendaraan yang dipilih

  alert(output);

  // Jika semua validasi sukses, form akan dikirim
  return true;
}
