<?php
# Memanggil fail connection.php
include('connection.php');

$masa = date("H:i:s");
foreach ($_POST['kehadiran'] as $nokp) {
    # Menyimpan semula data kehadiran yang baru
    $simpandata = mysqli_query($condb, "insert into kehadiran 
    (nokp,masa_hadir) values 
    ('$nokp','$masa') ");
}
echo "<script>alert('Kemaskini Kehadiran Selesai');
window.location.href='kehadiran-borang.php';
</script>";