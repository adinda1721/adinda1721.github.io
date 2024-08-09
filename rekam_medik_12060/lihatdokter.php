<?php
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("rekam_medik_12060", $conn);

$hasil = mysql_query("select * from dokter", $conn);
$jumlah = mysql_num_rows($hasil);
echo "<h3>Daftar Dokter</h3> Jumlah Dokter : $jumlah<br/>";
echo "<table border='1'>";
echo "<tr><th>No.</th> <th>Kode Dokter</th> <th>Nama Dokter</th> <th>Alamat</th> <th>Proses</th></tr>";

$a = 1;
while ($inputdokter = mysql_fetch_array($hasil)) {
    $kd_dokter = $inputdokter['kd_dokter'];
    $nm_dokter = $inputdokter['nm_dokter'];
    $alamat = $inputdokter['alamat'];
    echo "<tr><td>$a</td><td>$kd_dokter</td><td>$nm_dokter</td><td>$alamat</td>
    <td><a href='?kd_dokter=$kd_dokter' target='main'>Hapus</a>
    <a href='editdokter.php?kd_dokter=$kd_dokter&nm_dokter=$nm_dokter&alamat=$alamat' target='main'>Edit</a></td></tr>";
    $a++;
}
echo "</table>";

$kd_dokter = $_GET["kd_dokter"];
$sqlstr = "delete from dokter where kd_dokter='$kd_dokter'";
if (!empty($kd_dokter)) {
    $hasil = mysql_query($sqlstr, $conn) or die(mysql_error());
    echo "<meta http-equiv='refresh' content='2;url=lihatdokter.php'>";
    echo "berhasil dihapus";
}
?>
<p><a href="menu1.php" target="main">Kembali Ke Menu Dokter</a></p>
