<?php
session_start();
# memanggil fail connection dan kawalan-biasa
include('connection.php');

$masa = date("H:i:s");

# Menyemak kewujudan data 
if (!empty($_SESSION['nokp'])) {

    # Arahan Simpan data kehadiran
    $sql = "insert into kehadiran (nokp, masa_hadir) values ('" . $_SESSION['nokp'] . "', '$masa')";

    # Laksana arahan Simpan
    $simpan_data = mysqli_query($condb, $sql);

    # menguji proses simpan
    if ($simpan_data) {
        echo "<script>
        alert('Kehadiran Telah Disahkan');
        window.location.href='profil.php';
        </script>";
    } else {
        echo "<script>
        alert('Kehadiran GAGAL Disahkan. Sila Ke Meja Urusetia');
        window.location.href='profil.php';
        </script>";
    }
} else {
    echo "<script>
    alert('Akses secara terus');
    window.location.href='logout.php';
    </script>";
}
