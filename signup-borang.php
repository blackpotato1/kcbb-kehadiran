<?php
# memulakan fungsi SESSION 
session_start();

include('header.php');
include('connection.php');
?>
<!-- Tajuk antaramuka-->
<h3> Pendaftaran ahli Baru </h3>

<!-- Borang Pendaftaran ahli Baru-->
<form actio='signup-proses.php' method='POST'>
    Nama ahli
    <input type='text' name='nama' required><br>
    Nokp ahli
    <input type='text' name='nokp' required><br>
    Tingkatan
    <select name='id_kelas'><br>
        <option selected disabled value>Sila Pilih Kelas</option>
        <?php
        # Proses memaparkan senarai $arahan_sql_pilih
        $laksana_arahan_pilih = "select * from kelas";
        $laksana_arahan_pilih = mysqli_query($condb, $laksana_arahan_pilih);
        while ($m = mysqli_fetch_array($laksana_arahan_pilih)) {
            echo "<option value='" . $m['id_kelas'] . "'>
" . $m["ting"] . " " . $m["nama_kelas"] . "
</option>";
        } ?>
    </select> <br>
    Katalaluan <input type='password' nama='katalaluan' required> <br>
    <input type=' submit' value='Daftar'>
</form>
<?php include('footer.php'); ?>