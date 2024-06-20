<?php
# memulakan fungsi session
session_start();

# memanggil fail kawalan-admin.php
include('kawalan-admin.php');

# menyemak kewujudan data POST
if (!empty($_POST)) {
    # memanggil fail connection.php
    include('connection.php');

    # pengesahan data (validation) nokp ahli
    if (strlen($_POST['nokp']) != 12 or !is_numeric($_POST['nokp'])) {
        die("<script>alert('Ralat Nokp');
        window.history.back();</script>");
    }

    # arahan SQL (query) untuk kemaskini maklumat ahli
    $arahan = "update ahli set
    nama         ='" . $_POST['nama'] . "',
    nokp         ='" . $_POST['nokp'] . "',
    katalaluan   ='" . $_POST['katalaluan'] . "',
    id_kelas     ='" . $_POST['id_kelas'] . "',
    tahap        ='" . $_POST['tahap'] . "'
    where
    nokp         ='" . $_GET['nokp_lama'] . "' ";

    # melaksana dan menyemak proses kemaskini
    if (mysqli_query($condb, $arahan)) {
        # kemaskini berjaya
        echo "<script>alert('Kemaskini Berjaya');
        window.location.href='senarai-ahli.php';</script>";
    } else {
        # kemaskini gagal
        echo "<script>alert('Kemaskini Gagal');
        window.history.back();</script>";
    }
} else {
    # jika data GET tidak wujud, kembali ke fail senarai-ahli.php
    die("<script>alert('sila lengkapan data');
    window.location.href='senarai-ahli.php';</script>");
}
