<?php
$no_rm = $_GET["no_rm"];
$nama = $_GET["nama"];
$alamat = $_GET["alamat"];
$telp = $_GET["telp"];
$jk = $_GET["jk"];
?>

<h1>Edit Pasien</h1>
<form action="editpasien.php" method="post">
    No. RM Pasien : <?php echo $no_rm; ?>
    <input type="hidden" name="no_rm" value="<?php echo $no_rm; ?>" /><br/>
    Nama Pasien : <input type="text" name="nama" value="<?php echo $nama; ?>" /><br/>
    Alamat : <input type="text" name="alamat" value="<?php echo $alamat; ?>" /><br/>
    Telp : <input type="text" name="telp" value="<?php echo $telp; ?>" /><br/>
    J.K Pasien : <input type="text" name="jk" value="<?php echo $jk; ?>" /><br/>
    <input type="submit" value="Simpan" /><input type="reset" value="Reset" />
</form>
<p><a href="lihatpasien.php" target="main">Kembali Ke Lihat Pasien</a></p>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_rm = $_POST["no_rm"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telp = $_POST["telp"];
    $jk = $_POST["jk"];
    
    $conn = mysql_connect("localhost", "root", "") or die(mysql_error());
    mysql_select_db("rekam_medik_12060", $conn) or die(mysql_error());
    
    $sqlstr = "update pasien set nama='$nama', alamat='$alamat', telp='$telp', jk='$jk' where no_rm='$no_rm'";
    if (!empty($no_rm)) {
        $hasil = mysql_query($sqlstr, $conn) or die(mysql_error());
        echo "berhasil diedit";
        echo "<meta http-equiv='refresh' content='2;lihatpasien.php'>";
    }
}
?>
