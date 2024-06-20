<?php
date_default_timezone_set("Asia/Kuala_lumpur");

$nama_host = "localhost";
$nama_sql = "root";
$pass_sql = "";

$nama_db = "kehadiran_ahli";

$condb = mysqli_connect($nama_host, $nama_sql, $pass_sql, $nama_db);

if(!$condb){
    die("Sambung ke pangkalan data gagal");
}