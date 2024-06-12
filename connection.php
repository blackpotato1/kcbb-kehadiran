<?php
date_default_timezone_set("Asia/Kuala_Lumpur");

# nama host. localhost merupakan default
$nama_host = "localhost";

# usernama bagi SQL. root merupakan dafault
$nama_sql  = "root";

# password bagi SQL. masukkan password anda.
$pass_sql  = "";

# nama pangkalan data yang anda telah bangunkan sebelum ini.
$nama_db   = "kcbb_kehadiran";

#membuka hubungan antara pangkalan data dan sistem.
$condb     = mysqli_connect($nama_host, $nama_sql, $pass_sql, $nama_db);

#menguji adakah hubungan berjaya dibuka
if (!$condb)
{
    die("Sambungan ke pangkalan data gagal")
}
else
{
    #echo "Sambungan ke pangkalan data berjaya";
}
?>