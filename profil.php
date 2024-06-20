<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php dan fail connection.php
include('header.php');
include('connection.php');

# Menyemak kewujudan nilai pembolehubah session['nokp']
if (empty($_SESSION['nokp'])) {
    # Jika nilai session nokp tidak wujud/kosong, aturcara akan dihentikan
    die("<script>alert('sila login');
    window.location.href='logout.php';</script>");
}
?>

<table width='100%' bgcolor='#afeeee' border='1'>
    <tr>
        <td width='70%' align='center' valign='top'>
            <h3>Rekod Kehadiran</h3>
            <!-- Header bagi jadual untuk memaparkan senarai aktiviti -->
            <table align='center' width='100%' border='1' id='saiz' bgcolor='white'>
                <caption>
                    Pengesahan Kendiri hanya boleh dilakukan pada tarikh aktiviti dilaksanakan sahaja
                </caption>
                <?php
                # Arahan mendapatkan data kehadiran ahli bagi setiap aktiviti
                $arahan_sql_hadir = "select * from kehadiran where nokp ='" . $_SESSION['nokp'] . "';";

                # melaksanakan arahan sql mendapatkan data
                $laksana_hadir = mysqli_query($condb, $arahan_sql_hadir);

                if (mysqli_num_rows($laksana_hadir) == 1) {
                    echo "&#9989;";
                } else {
                    echo "&#10060;<br>";
                }

                echo "</td></tr>";
                ?>
            </table>
        </td>
        <td align='center' valign='top'>
            <h3>IMBAS CODE UNTUK SAH KEHADIRAN</h3>
            <p>
                Nama : <?= $_SESSION['nama'] ?><br>
                Nokp : <?= $_SESSION['nokp'] ?><br>
            </p>
            <?php
            # mengambil data untuk dijadikan QR code atau bar code
            $data = $_SESSION['nokp'];
            $saiz = "200x200";
            # set umpukkan data API untuk memaparkan QR kod
            $qr_api = "https://chart.googleapis.com/chart?chs=" . $saiz . "&cht=qr&chl=" . $data;
            echo "<div align='center'><img width='50%' src='" . $qr_api . "'></div>";
            ?>
            <br>
        </td>
    </tr>
</table>
<?php include('footer.php'); ?>