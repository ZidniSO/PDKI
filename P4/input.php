<?php
include 'config.php';
include 'rsa.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    // enkripsi RSA
    $nama_enc = rsa_encrypt($nama, $e, $n);
    $alamat_enc = rsa_encrypt($alamat, $e, $n);

    mysqli_query($conn, "INSERT INTO biodata (nama, alamat) VALUES ('$nama_enc', '$alamat_enc')");

    echo "Data berhasil disimpan!";
}
?>

<h2>Input Biodata (RSA)</h2>
<form method="POST">
    Nama:<br>
    <input type="text" name="nama" required><br><br>

    Alamat:<br>
    <input type="text" name="alamat" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

<br>
<a href="tampil.php">Lihat Data</a>