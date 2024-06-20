<?php
session_start();

include('header.php');
include('kawalan-admin.php');
include('connection.php');

if (empty($_GET)) {
    die("<script>window.location.href='senarai-ahli.php';</script>");
}
?>

<h3>kemaskini ahli Baru</h3>
<form action='ahli-kemaskini-proses.php?nokp_lama=<?= $_GET['nokp'] ?>' method='POST'>
    nama
    <input type='text' nama='nama' value='<?= $_GET['nama'] ?>' required><br>
    nokp
    <input type='text' nama='nokp' value='<?= $_GET['nokp'] ?>' required><br>
    katalalaun
    <input type='text' nama='katalaluan' value='<?= $_GET['katalaluan'] ?>' required><br>
    tahap
    <select nama='tahap'><br>

        <option value='<?= $_GET['tahap'] ?>'><?= $_GET['tahap'] ?> </option>
        <?php
        $arahan_sql_tahap = "select tahap from ahli group by tahap order by tahap";
        $laksanakan_arahan_tahap = mysqli_query($condb, $arahan_sql_tahap);
        while ($n = mysqli_fetch_array($laksanakan_arahan_tahap)) {
            if ($n['tahap'] != $_GET['tahap']) {
                echo "<option value'" . $n['tahap'] . "'>"
                    . $n["tahap"] . " </option>";
            }
        }
        ?>
    </select> <br>
    Tingkatan
    <select name='id_kelas'><br>
        <option value='<?= $_GET['id_kelas'] ?>'>
            <?= $_GET['ting'] . " " . $_GET['nama_kelas'] ?>
        </option>
        <?php
        $arahan_sql_pilihan = "select * from kelas";
        $laksanakan_arahan_pilihan = mysqli_query($condb, $arahan_sql_pilihan);
        while ($m = mysqli_fetch_array($laksanakan_arahan_pilihan)) {
            if ($m['id_kelas'] != $_GET["id_kelas"]) {
                echo "<option value='" . $m['id_kelas'] . "'>
            " . $m['ting'] . " " . $m['nama_kelas'] . "
            </option";
            }
        }
        ?>
    </select> <br>
    <input type='submit' value='KemasKini'>
</form>
<?php include('footer.php'); ?>