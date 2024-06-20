<?php
# memulakan fungsi session
session_start();

#memanggil fail header.php, connection.php dan guard-admin.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');

?>

<h3>Pengesahan Kehadiran Ahli</h3>

<br><br>

<?php include('butang-saiz.php'); ?>
<form action='kehadiran-proses.php' method='POST'>
    <table border='1' id='saiz' width='100%'>
        <tr>
            <td>Bil</td>
            <td>Nama</td>
            <td>Nokp</td>
            <td>Kelas</td>
            <td>Kehardiran</td>
        </tr>

        <?php

        # Arahan untuk mendapatkan data kehadiran setiap ahli
        $arahan_sql_kehadiran = "SELECT
ahli.nokp, ahli.nama,
kelas.ting, kelas.nama_kelas
FROM ahli 
LEFT JOIN kelas 
ON ahli.id_kelas = kelas.id_kelas
LEFT JOIN kehadiran
ON ahli.nokp = kehadiran.nokp'
ORDER BY ahli.nama";

        # Laksanakan arahan untuk memproses data
        $laksana_kehadiran = mysqli_query($condb, $arahan_sql_kehadiran);
        $bil = 0;

        while ($m = mysqli_fetch_array($laksana_kehadiran)) { ?>
            <tr>
                <td><?= ++$bil ?></td>
                <td><?= $m['nama'] ?></td>
                <td><?= $m['nokp'] ?></td>
                <td><?= $m['ting'] . "-" . $m['nama_kelas'] ?></td>
                <td><?php
                    $tanda = 'checked';
                    ?>

                    <input <?= $tanda ?> type='checkbox' name='kehadiran[]' value='<?= $m['nokp'] ?>' style='width:30px; height:30px;'>
                </td>
            </tr>
        <?php
        } ?>
        <tr>
            <td colspan='4'></td>
            <td><input type='submit' value='Simpan'></td>
        </tr>
    </table>
</form>
<?php include('footer.php'); ?>