<h1>SMK BERSINAR BINTANG</h1>

<link rel="stylesheet" type="text/css" href="style.css" />

<hr>

<?PHP if (!empty($_SESSION['tahap']) && $_SESSION['tahap'] == "ADMIN") { ?>
    <a href='index.php'>Laman Utama</a>
    <a href='profil.php'>Profil</a>
    <a href='kehadiran-rekod.php'>Kaunter Kehadiran</a>
    <a href='senarai-ahli.php'>Senarai Ahli</a>
    <a href='kehadiran-laporan.php'>Laporan kehadiran</a>
    <a href='logout.php'>logout</a>
<?php } else if (!empty($_SESSION['tahap']) && $_SESSION['tahap'] == "AHLI BIASA") { ?>
    <a href='index.php'>Laman Utama</a>
    <a href='profil.php'>Profil</a>
    <a href='kehadiran-isi.php'>Isi Kehadiran</a>
    <a href='logout.php'>logout</a>
<?php } else { ?>
    <a href='index.php'>Laman Utama</a>
    <a href='login-borang.php'>Daftar Masuk Ahli</a>
    <hr>
<?php } ?>