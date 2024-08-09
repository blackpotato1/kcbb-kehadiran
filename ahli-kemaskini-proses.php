<?php
session_start();

include('kawalan-admin.php');

if (!empty($_POST)) {
    include('connection.php');
    if (strlen($_POST['nokp']) != 12 or !is_numeric($_POST['nokp'])) {
        echo "<script>alert('Nombor Kad Pengenalan tidak sah');
        window.history.back();</script>";
    }

    $arahan = "update ahli set nama='" . $_POST['nama'] . "', nokp='" . $_POST['nokp'] . "', katalaluan='" . $_POST['katalaluan'] . "', tahap='" . $_POST['tahap'] . "', id_kelas='" . $_POST['id_kelas'] . "' where nokp='" . $_GET['nokp_lama'] . "'";

    if (mysqli_query($condb, $arahan)) {
        echo "<script>alert('Kemaskini data berjaya');
        window.location.href='senarai-ahli.php';</script>";
    } else {
        echo "<script>alert('Kemaskini data gagal');
        window.history.back();</script>";
    }
} else {
    die("<script>alert('Ralat! akses secara terus');
    window.location.href='senarai-ahli.php';</script>");
}
