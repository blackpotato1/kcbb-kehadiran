<?php
# Memanggil fail connection.php
include('connection.php');

# Memadam data kehadiran lama agar dapat memasukkan data kehadiran baru
$sqlpadam = mysqli_query($condb, "delete from kehadiran where 
id_aktiviti='" . $_GET['id_aktiviti'] . "'");
$masa = date("H:i:s");
foreach ($_POST['kehadiran'] as $nokp) {
    # Menyimpan semula data kehadiran yang baru
    $simpandata = mysqli_query($condb, "insert into kehadiran 
    (nokp,id_aktiviti,masa_hadir) values 
    ('$nokp','" . $_GET['id_aktiviti'] . "','$masa') ");
}
echo "<script>alert('Kemaskini Kehadiran Selesai');
window.location.href='kehadiran-borang.php?id_aktiviti=" . $_GET['id_aktiviti'] . "';
</script>";
