<?php
# memulakan fungsi session
session_start();

#memanggil fail header, kawalan-admin
include('header.php');
include('kawalan-admin.php');
?>

<!-- Tajuk laman -->
<h3>Muat Naik Data ahli (*.txt)</h3>

<!-- Borang untuk memuat naik fail -->
<form action='' method='POST' enctype='multipart/form-data'>
    <h3><b>Sila Pilih Fail txt yang ingin dipupload</b></h3>
    <input type='file' name='data_ahli'>
    <input type='submit' name='btn-upload' Muat Naik>
</form>
<?php include('footer.php'); ?>

<!-- Bahagian Memproses Data yang dimuat naik -->
<?php
# data validation : menyemak kewujudan data dari borang
if (isset($_POST['btn-upload'])) {
    # memanggil fail connection
    include('connection.php');

    # mengambil nama sementara fail
    $namafailsementara = $_FILES['data_ahli']['tmp_name'];

    # mengambil nama fail
    $namafail = $_FILES['data_ahli']['name'];

    # mengambil jenis fail
    $jenisfail = pathinfo($namafail, PATHINFO_EXTENSION);

    # menguji jenis fail dan saiz fail
    if ($_FILES["data_ahli"]["size"] > 0 and $jenisfail == "txt") {
        # membuka fail yang diambil
        $fail_data_ahli = fopen($namafailsementara, "r");

        # mendapatkan data dari fail baris demi baris
        while (!feof($fail_data_ahli)) {
            # mengambil data sebaris sahaja bg setiap pusingan
            $ambilbarisdata = fgets($fail_data_ahli);

            # memecahkan baris data mengikut tanda pipe
            $pecahkanbaris = explode("|", $ambilbarisdata);

            # selepas pecahan tadi akan diumpukan kepada 5
            list($nokp, $nama, $id_kelas, $katalaluan, $tahap) = $pecahkanbaris;

            # arahan SQL untuk menyimpan data
            $arahan_sql_simpan = "insert into ahli (nokp,nama,id_kelas,katalaluan,tahap) values ('$nokp','$nama','$id_kelas','$katalaluan','$tahap')";

            # memasukkan data kedalam jadual ahli
            $laksana_arahan_simpan = mysqli_query($condb, $arahan_sql_simpan);
            echo "<script>alert('import fail Data Selesai');
        window.location.href='senarai-ahli.php';
        </script>";
        }

        # menutup fail txt yang dibuka
        fclose($fail_data_ahli);
    } else {
        # jika fail yang dimuat naik kosong atau tersalah format.
        echo "<script>alert('hanya fail berformat txt sahaja dibenarkan');</script>";
    }
}
?>