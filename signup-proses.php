<?php
# memulakan fungsi SESSION 
session_start();
# menyemak kewujudan data post 
if (!empty($_POST)) {
    # Memanggil fail Connection.php 
    include 'connection.php';
    # Mengambil data yang_dihantar dari fa. gnup-borang.php ' 
    $nama = $_POST['nama'];
    $nokp = $_POST['nokp'];
    $id_kelas = $_POST['id_kelas'];
    $katalaluan = $_POST['katalaluan'];

    # data validation : had atas had bawah 
    # nokp yang dimasukkan hendaklah bol 12 digit dan tidak mempunyai huruf atau sim 
    if (strlen($nokp) != 12 or !is_numeric($nokp)) {
        die("<script>alert (' Ralat Pada No Kad Pengenalan');
 window.location.href='signup-borang.php';</script>");
    }
    # menyemak adakah nokp yang dimasukkan telah wujud dalam pangkalan data 
    $arahan_sql_semak = "select * from ahli where nokp='$nokp' limit 1";
    $laksana_arahan_semak = mysqli_query($condb, $arahan_sql_semak);
    if (mysqli_num_rows($laksana_arahan_semak) == 1)
        # jika nokp yang dimasukkan telah wujud. aturcara akan dihentikan.
        die("<script>alert('RALAT NOKP. Nokp yang dimasukkan telah digunakan');
    window.location.href:'signup-borang.php';  </script>");
    # arahan SQL (query) untuk menyimpan data ahli baru 
    $arahan_sql_simpan = "insert into ahli (nokp, nama, id_kelas, katalaluan, tahap) values
    ('$nokp', '$nama', '$id_kelas', '$katalaluan','AHLI BIASA') ";
    # Melaksanakan arahan SQL menyimpan data ahli baru 
    $laksana_arahan_simpan = mysqli_query($condb, $arahan_sql_simpan);
    # menguji jika proses menyimpan data berjaya atay tidak 
    if ($laksana_arahan_simpan) {
        echo "<script>alert('Data Berjaya Disimpan');
    window.location.href='login-borang.php';</script>";
    } else
    # jika data tidak berjaya disimpan. papar popup dan buka fail signup-borang
    {
        echo "<script> alert('Pendaftaran Gagal'); 
window. location.href='signup-borang.php'; </script>";
    }
} else { # jika pengguna buka fail ini tanpa mengisi data.
    # papar popup dan buka fail signup-borang.php
    echo "<script>alert('sila lengkapkan maklumat');
window. location.href='signup-borang.php'; </script>";
}
