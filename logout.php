<?PHP
# memulakan fungsi session antaramika
session_start();
# menghapuskan nilai pembolehubah session
session_unset();
# menghentikan fungsi session
session_destroy();
echo "<script>window.location.href='index.php';</script>";