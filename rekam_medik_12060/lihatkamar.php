<?php
$conn = mysqli_connect("localhost", "root", "", "rekam_medik");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$hasil = mysqli_query($conn, "SELECT * FROM kamar");
$jumlah = mysqli_num_rows($hasil);

echo "<h3>Daftar Kamar</h3> Jumlah Kamar: $jumlah <br/>";
echo "<table border='1'>";
echo "<tr><th>No.</th> <th>No.Kamar</th> <th>Nama Kamar</th> <th>Kelas</th> <th>Tarif</th> <th>Proses</th></tr>";

$a = 1;
while ($baris = mysqli_fetch_array($hasil)) {
    echo "<tr>
        <td>$a</td>
        <td>{$baris['no_kamar']}</td>
        <td>{$baris['nm_kamar']}</td>
        <td>{$baris['kelas']}</td>
        <td>{$baris['tarif']}</td>
        <td>
            <a href='?no_kamar={$baris['no_kamar']}' target='main'>Hapus</a> |
            <a href='editkamar.php?no_kamar={$baris['no_kamar']}&nm_kamar={$baris['nm_kamar']}&kelas={$baris['kelas']}&tarif={$baris['tarif']}' target='main'>Edit</a>
        </td>
    </tr>";
    $a++;
}
echo "</table>";

if (isset($_GET['no_kamar'])) {
    $no_kamar = $_GET['no_kamar'];
    $sqlstr = "DELETE FROM kamar WHERE no_kamar='$no_kamar'";

    if (!empty($no_kamar)) {
        $hasil = mysqli_query($conn, $sqlstr) or die(mysqli_error($conn));
        echo "<meta http-equiv='refresh' content='2;url=?'>";
        echo "berhasil dihapus";
    }
}
?>

<p><a href="kamar.php" target="main">Kembali Ke Menu Kamar</a></p>
