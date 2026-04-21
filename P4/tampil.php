<?php
include 'config.php';
include 'rsa.php';
$data = mysqli_query($conn, "SELECT * FROM biodata");

echo "<h2>Data Biodata (RSA)</h2>";
while($dta = mysqli_fetch_array($data)){
    $nama = rsa_decrypt($dta['nama'], $d, $n);
    $alamat = rsa_decrypt($dta['alamat'], $d, $n);

    echo "Nama: ".$nama."<br>";
    echo "Alamat: ".$alamat."<br>";
}
?>
<br>
<a href="input.php">Input Lagi</a>