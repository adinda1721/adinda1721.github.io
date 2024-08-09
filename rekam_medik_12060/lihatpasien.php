<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("rekam_medik_12060", $conn);

$hasil = mysql_query("select * from pasien", $conn);
$jumlah = mysql_num_rows($hasil);
echo "<h3>Daftar Pasien</h3> Jumlah Pasien : $jumlah<br/>";
echo "<table border='1'>";
echo "<tr><th>No.</th> <th>No. RM Pasien</th> <th>Nama Pasien</th> <th>Alamat</th> <th>Telp</th> <th>J.K Pasien</th> <th>Proses</th></tr>";

$a = 1;
while ($baris = mysql_fetch_array($hasil)) {
    echo "<tr>
        <td>$a</td>
        <td>{$no_rm['No_RM Pasien']}</td>
        <td>{$nama['Nama Pasien']}</td>
        <td>{$alamat['Alamat']}</td>
        <td>{$telp['Telp']}</td>
        <td>{$jk['J.K Pasien']}</td>
        <td>
            <a href='?no_rm={$no_rm['No. RM Pasien']}' target='main'>Hapus</a> |
            <a href='editpasien.php?no_rm={$no_rm['No. Rm Pasien']}&nama={$nama['Nama Pasien']}&alamat={$alamat['Alamat']}&telp={$telp['Telp']}&jk={$jk['J.K Pasien']}' target='main'>Edit</a>
        </td>
    </tr>";
    $a++;
}
echo "</table>";

$no_rm = $_GET["no_rm"];
$sqlstr = "delete from pasien where no_rm='$no_rm'";
if (!empty($no_rm)) {
    $hasil = mysql_query($sqlstr, $conn) or die(mysql_error());
    echo "<meta http-equiv='refresh' content='2;url=lihatpasien.php'>";
    echo "berhasil dihapus";
}
?>
<p><a href="menu2.php" target="main">Kembali Ke Menu Pasien</a></p>
