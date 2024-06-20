<?php
# memulakan fungsi session
session_start();

#mengambil fail header.php, connection.php dan guard-aktiviti1.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');

?>
<h3>Laporan Kehadiran aktiviti</h3>

<table align='center' width='100%' border='1' id='saiz'>
    <tr bgcolor='cyan'>
        <td colspan='3'>
            <form action='kehadiran-laporan.php?id_aktiviti=<?= $id_aktiviti; ?>' method='POST' style='margin:0; padding:0;'>
                <input type='text' name='nama' placeholder='Carian Nama Ahli'>
                <input type='submit' value='Cari'>
            </form>
        </td>
        <td colspan='3' align='right'>
            <?php include('butang-saiz.php'); ?>
        </td>
    </tr>
    <tr bgcolor='yellow'>
        <td>Bil</td>
        <td>Nama</td>
        <td>NoK/P</td>
        <td>Kelas</td>
        <td>Kehadiran</td>
    </tr>

    <?php
    # syarat tambahan yang akan dimasukkan dalam arahan(query) senarai ahli
    $tambahan = "";
    if (!empty($_POST['nama'])) {
        $tambahan = " where ahli.nama like '%" . $_POST['nama'] . "%'";
    }

    # arahan query untuk mencari senarai Aktiviti
    $arahan_papar = "
SELECT * , ahli.nokp
FROM ahli
LEFT JOIN kelas
ON ahli.id_kelas = kelas.id_kelas
LEFT JOIN kehadiran
ON ahli.nokp = kehadiran.nokp
ORDER BY ahli.nama ";

    $laksana = mysqli_query($condb, $arahan_papar);
    $hadir = $takhadir = $bil = 0;

    while ($m = mysqli_fetch_array($laksana)) {
        echo "<tr>
    <td>" . ++$bil . "</td>
    <td>" . $m['nama'] . "</td>
    <td>" . $m['nokp'] . "</td>
    <td>" . $m['ting'] . "-" . $m['nama_kelas'] . "</td>
    <td align='center'>";

        if (strlen($m['masa_hadir']) > 0) {
            echo "&#9989;";
        } else {
            echo "&#10060;";
        }
    }
    echo "</table>";
    ?>
    <?php include 'footer.php'; ?>