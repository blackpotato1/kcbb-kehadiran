<?php
# memulakan fungsi session
session_start();

#mengambil fail header.php, connection.php dan guard-aktiviti1.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');

?>
<h3>Laporan Kehadiran aktiviti</h3>
<!-- Boarang carian Aktiviti -->
<form action='' method='GET'>
    Aktiviti <select name='id_aktiviti'>
        <option selected disabled value>Sila Pilih Aktiviti</option>

        <?php
        # Proses memaparkan senarai aktiviti dalam bentuk drop down list
        $arahan_sql_pilih = "select* from aktiviti";
        $laksana_arahan_pilih = mysqli_query($condb, $arahan_sql_pilih);
        while ($n = mysqli_fetch_array($laksana_arahan_pilih)) {
            echo "<option value='" . $n['id_aktiviti'] . "'>"
                . $n['id_aktiviti'] . " | " . $n['nama_aktiviti'] . "
                </option>";
        }
        ?>
    </select>
    <input type='submit' value='Cari'>
</form>

<?php
# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai aktiviti
$tambahan = "";
if (!empty($_GET['id_aktiviti'])) {
    # Mengambil nilai data GET di URL
    $id_aktiviti = $_GET['id_aktiviti'];

    # proses mendapatkan maklumat aktiviti
    $sql_aktiviti = "select* from aktiviti where id_aktiviti = '$id_aktiviti'";
    $laksana_aktiviti = mysqli_query($condb, $sql_aktiviti);
    $ma = mysqli_fetch_array($laksana_aktiviti);

    # Mendapatkan Analisis Kehadiran (bil hadir & bil ahli)
    $arahanSQL = " SELECT 
    (SELECT COUNT(*) FROM kehadiran 
    where id_aktiviti = '" . $ma['id_aktiviti'] . "') AS bil_hadir,
    (SELECT COUNT(*) FROM ahli ) AS bil_ahli ";
    $laksanaSQL = mysqli_query($condb, $arahanSQL);
    $da = mysqli_fetch_array($laksanaSQL);
}
?>
<!-- Header bagi jadual untuk memaparkan senarai aktiviti -->
<h3>
    <?= $ma['nama_aktiviti']; ?> <br>
    <?= $ma['tarikh_aktiviti']; ?> | <?= $ma['masa_mula']; ?> <br>
    Kehadiran : <?= $da['bil_hadir']; ?> / <?= $da['bil_ahli']; ?> <br>
    Peratus : <?php echo number_format(($da['bil_hadir'] / $da['bil_ahli']) * 100, 2); ?>%
</h3>

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
and id_aktiviti like '$id_aktiviti%'
$tambahan
ORDER BY ahli.nama ";

    $laksna = mysqli_query($condb, $arahan_papar);
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