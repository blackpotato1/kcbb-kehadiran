<?php
# memulakan fungsi session
session_start();

#memanggil fail header.php, connection.php dan kawalan-admin.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');
?>

<!-- Header bagi jadual untuk memaparkan senarai ahli -->
<h3 align='center'>Senarai ahli</h3>

<table align='center' width='100%' border='1' id='saiz'>
    <tr bgcolor='cyan'>
        <td colspan='3'>
            <form action='' method='POST' style='margin:0; padding:0;'>
                <input type='text' name='nama' placeholder='Carian Nama Ahli'>
                <input type='submit' value='Cari'>
            </form>
        </td>
        <td colspan='3' align='right'>
            <a href='upload.php'>Muat Naik ahli</a> |
            <?php include('butang-saiz.php'); ?>
        </td>
    </tr>
    <tr bgcolor='yellow'>
        <td width='35%'>Nama</td>
        <td width='15%'>NoKp</td>
        <td width='10%'>Kelas</td>
        <td width='10%'>Katalaluan</td>
        <td width='10%'>Xthap</td>
        <td width='20%'>Tindakan</td>
    </tr>

    <?php
    # syarat tambahan yang akan dimasukkan dalam arahan(query) senarai ahli
    $tambahan = "";
    if (!empty($_POST['nama'])) {
        $tambahan = " and ahli.nama like '%" . $_POST['nama'] . "%'";
    }
    # arahan query untuk mencari senarai nama ahli
    $arahan_papar = "select * from ahli, kelas
where ahli.id_kelas = kelas.id_kelas
$tambahan ";

    # laksanakan arahan mencari data ahli
    $laksana = mysqli_query($condb, $arahan_papar);

    # Mengambil data yang ditemui
    while ($m = mysqli_fetch_array($laksana)) {
        # umpukkan data kepada tatasusunan bagi tujuan kemaskini ahli
        $data_get = array(
            'nama'       => $m['nama'],
            'nokp'       => $m['nokp'],
            'katalaluan' => $m['katalaluan'],
            'tahap'      => $m['tahap'],
            'id_kelas'   => $m['id_kelas'],
            'ting'       => $m['ting'],
            'nama_kelas' => $m['nama_kelas']
        );

        # memaparkan senarai nama dalam jadual
        echo "<tr>
    <td>" . $m['nama'] . "</td>
    <td>" . $m['nokp'] . "</td>
    <td>" . $m['ting'] . "-" . $m['nama_kelas'] . "</td>
    <td>" . $m['katalaluan'] . "</td>
    <td>" . $m['tahap'] . "</td> ";

        # memaparkan navigasi untuk kemaskini dan hapus data ahli
        echo "<td>
    <a href='ahli-kemaskini-borang.php?" . http_build_query($data_get) . "'>Kemaskini</a>
    |
    <a href='ahli-padam-proses.php?nokp=" . $m['nokp'] . "'
    onclick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">Hapus</a>
    </td>
    </tr>";
    }
    ?>
</table>
<?php include('footer.php'); ?>