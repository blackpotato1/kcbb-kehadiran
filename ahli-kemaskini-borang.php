<?php
# memulakan fungsi session
session_start();


#memanggil fail header dan fail kawalan-admin.php
include('header.php');
include('kawalan-admin.php');
include('connection.php');


#menyemak kewujudan data GET.
if (empty($_GET)) {
    echo "<script>alert('Tiada data yang dihantar');
    window.location.href='senarai-ahli.php';
    </script>";
}

?>

<h3>kemaskini ahli Baru</h3>
<form action='ahli-kemaskini-proses.php?nokp_lama=<?= $_GET['nokp'] ?>' method='POST'>
    nama
    <input type='text' name='nama' value='<?= $_GET['nama'] ?>' required><br>
    nokp
    <input type='text' name='nokp' value='<?= $_GET['nokp'] ?>' required><br>
    katalaluan
    <input type='text' name='katalaluan' value='<?= $_GET['katalaluan'] ?>' required><br>
    tahap
    <select name='tahap'><br>
        <option value='<?= $_GET['tahap'] ?>'><?= $_GET['tahap'] ?></option>
        <?php
        #proses memapar senarai tahpap dalam bentuk drop down
        $arahan = "select tahap from ahli group by tahap order by tahap";
        $laksana = mysqli_query($condb, $arahan);
        while ($m = mysqli_fetch_array($laksana)) {
            if ($m['tahap'] != $_GET['tahap'])
                echo "<option value='" . $m['tahap'] . "'>" . $m['tahap'] . "</option>";
        }
        ?>
    </select> <br>
    Tingkatan
    <select name='id_kelas'><br>
        <option value='<?= $_GET['id_kelas'] ?>'><?= $_GET['ting'] . " " . $_GET['id_kelas'] ?></option>
        <?php
        $arahan = "select * from kelas";
        $laksana = mysqli_query($condb, $arahan);
        while ($m = mysqli_fetch_array($laksana)) {
            if ($m['id_kelas'] != $_GET['id_kelas'])
                echo "<option value='" . $m['id_kelas'] . "'>" . $m['ting'] . " " . $m['id_kelas'] . "</option>";
        }
        ?>
    </select> <br>
    <input type='submit' name='btn-kemaskini' value='Kemaskini'>
</form>
<?php include('footer.php'); ?>