<?php
# memulakan fungsi SESSION
session_start();

# menyemak kewujudan data post
if(!empty($_POST))
{
    # Memanggil fail Connection.php
    include ('connection.php');

    # Mengambil data yang dihantar dari fail signup.php
    $nama          =  $_POST['nama'];
    $id_kelas      =  $_POST['id_kelas'];
    $katalaluan    =  $_POST['katalaluan'];

    # data validation : had atas had bawah
    
    # arahan SQL (query) untuk menyimpan data ahli baru
    $arahan_sql_simpan = "insert into ahli
    (nama, id_kelas, katalaluan, tahap)
    values
    ('$nama', '$id_kelas', '$katalaluan', 'MURID) ";

    # Melaksanakan arahan SQL menyimpan data ahli baru
    $laksana_arahan_simpan = mysqli_query($condb,$arahan_sql_simpan);

    # menguji jika proses menyimpan data berjaya atau tidak
    if($laksana_arahan_simpan)
    {
        # jika data berjaya disimpan. papar popup dan buka fail ahli-login
        echo"<script>alert('Pendaftaran Berjaya. Sila Log Masuk');
        window.location.href='login.php'; </script>";
    }
else
    {
        # jika data tidak berjaya disimpan. papar popup dan buka fail signup
        echo"<script>alert('Pendaftaran Gagal');
        window.location.href='signup.php'; </script>";
    }
}
else
{
    # jika pengguna buka fail ini tanpa mengisi data.
    # papar popup dan buka fail signup.php
    echo"<script>alert('Sila lengkapkan maklumat');
    window.location.href='signup.php'; </script>";
}
?>
