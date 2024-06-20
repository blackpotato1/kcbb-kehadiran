<?php
session_start();
# memanggil fail connection dan kawalan-biasa
include('connection.php');

$masa = date("H:i:s");

# Menyemak kewujudan data GET id_aktiviti
if (!empty($_GET['id_aktiviti']) and !empty($_SESSION['nokp'])) {

    # Arahan Simpan data kehadiran
    $sql = "insert into kehadiran (id_aktiviti, nokp, masa_hadir) values ('" . $_GET['id_aktiviti'] . "', '" . $_SESSION['nokp'] . "', '$masa')";

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
