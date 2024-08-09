<?php
$conn = mysqli_connect("localhost", "root", "", "rekam_medik");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "
    SELECT perawatan.no_kamar, kamar.nm_kamar,
           perawatan.no_rm, pasien.nama,
           perawatan.kd_dokter, dokter.nm_dokter,
           perawatan.diagnose
    FROM perawatan
    JOIN kamar ON perawatan.no_kamar = kamar.no_kamar
    JOIN pasien ON perawatan.no_rm = pasien.no_rm
    JOIN dokter ON perawatan.kd_dokter = dokter.kd_dokter
";

$hasil = mysqli_query($conn, $query);

if (!$hasil) {
    die("Query failed: " . mysqli_error($conn));
}

$jumlah = mysqli_num_rows($hasil);

echo "<h3>Daftar Kamar</h3> Jumlah Kamar : $jumlah <br/>";
echo "<table border='1'>";
echo "<tr>
    <th>No.</th>
    <th>No. Kamar</th>
    <th>Nama Kamar</th>
    <th>No. RM</th>
    <th>Nama Pasien</th>
    <th>Kode Dokter</th>
    <th>Nama Dokter Perawatan</th>
    <th>Diagnose</th>
    <th>Proses</th>
</tr>";

$a = 1;
while ($baris = mysqli_fetch_assoc($hasil)) {
    echo "<tr>
        <td>$a</td>
        <td>{$baris['no_kamar']}</td>
        <td>{$baris['nm_kamar']}</td>
        <td>{$baris['no_rm']}</td>
        <td>{$baris['nama']}</td>
        <td>{$baris['kd_dokter']}</td>
        <td>{$baris['nm_dokter']}</td>
        <td>{$baris['diagnose']}</td>
        <td> <a href='?no_kamar={$baris['no_kamar']}&no_rm={$baris['no_rm']}&kd_dokter={$baris['kd_dokter']}' target='main'>Hapus</a>
        </td>
    </tr>";
    $a++;
}
echo "</table>";

if (isset($_GET["no_kamar"]) && isset($_GET["no_rm"]) && isset($_GET["kd_dokter"])) {
    $no_kamar = $_GET["no_kamar"];
    $no_rm = $_GET["no_rm"];
    $kd_dokter = $_GET["kd_dokter"];
    
    $sqlstr = "DELETE FROM perawatan WHERE no_kamar='$no_kamar' AND no_rm='$no_rm' AND kd_dokter='$kd_dokter'";
    $delete_result = mysqli_query($conn, $sqlstr);
    
    if ($delete_result) {
        echo "<meta http-equiv='refresh' content='2;url=perawatan.php'>";
        echo 'Berhasil dihapus';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<p><a href="perawatan.php" target="main"> Kembali Ke Menu Perawatan </a></p>
