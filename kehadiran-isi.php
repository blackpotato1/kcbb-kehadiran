<?php
# memulakan fungsi session
session_start();

# menanggil fail luaran dan istihar pemboleh ubah.
include('header.php');
include('connection.php');
$masa = date("H:i:s");
$status = ""; # gunakan untuk memaparkan status kehadiran
$warna = ""; # digunakan untuk warna latar belakang status

# menyemak kewujudan data POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $arahan_semak = "select * from kehadiran where nokp = '" . $_POST['nokp'] . "' limit 1;";
    $laksana_arahan = mysqli_query($condb, $arahan_semak);
    if (mysqli_num_rows($laksana_arahan) == 1) {
        echo "<script>alert('Anda telah mengesahkan kehadiran sebelum ini.');
    window.location.href='profil.php'</script>;";
        die();
    }
    # Proses Menyimpan data kehadiran
    $simpandata = mysqli_query($condb, "insert into kehadiran (nokp,masa_hadir) values ('" . $_SESSION['nokp'] . "','" . $masa . "') ");
    echo "<script>alert('Kehadiran Telah Disahkan');
    window.location.href='profil.php'</script>;";
}
?>
<h1 align='center'>Laman Rekod Kehadiran Kaunter Urusetia</h1>
<h3 align='center'>
    <!-- Borang carian Aktiviti -->
    <form align='center' action='' method='POST'>
        <?php $arahan_semak = "select * from kehadiran where nokp = '" . $_SESSION['nokp'] . "' limit 1;";
        $laksana_arahan = mysqli_query($condb, $arahan_semak);
        if (mysqli_num_rows($laksana_arahan) == 1) {
            echo "<script>alert('Anda telah mengesahkan kehadiran sebelum ini.');
    window.location.href='profil.php'</script>;";
            die();
        } else {
            echo "<input type='submit' value='Rekod Kehadiran'>";
        }
        ?>
    </form>
</h3>