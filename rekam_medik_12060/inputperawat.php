<?php
$conn = mysqli_connect("localhost", "root", "", "rekam_medik_12060");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<HTML>
<HEAD><title>Input Perawatan</title></HEAD>
<BODY>

<h1>Input Perawatan</h1>
<form action="inputperawat.php" method="post">
    Kamar : <select name="no_kamar" class="text2">
        <?php
        $hasil = mysqli_query($conn, "SELECT no_kamar, nm_kamar FROM kamar");
        while ($baris = mysqli_fetch_array($hasil)) {
            echo "<option value='{$baris['no_kamar']}'>{$baris['no_kamar']} {$baris['nm_kamar']}</option>";
        }
        ?>
    </select><br/>

    Pasien : <select name="no_rm" class="text2">
        <?php
        $hasil = mysqli_query($conn, "SELECT no_rm, nama FROM pasien");
        while ($baris = mysqli_fetch_array($hasil)) {
            echo "<option value='{$baris['no_rm']}'>{$baris['no_rm']} {$baris['nama']}</option>";
        }
        ?>
    </select><br/>

    Dokter Perawat : <input type="text" name="kd_dokter" size="55" maxlength="50"><br>
    Diagnosa : <input type="text" name="diagnosa" size="80" maxlength="80"><br>
    <input type="submit" value="Simpan">
    <input type="reset" value="Reset">
</form>
<p><a href="menu4.php" target="main">Kembali Ke Menu Perawatan</a></p>

</BODY>
</HTML>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_kamar = $_POST['no_kamar'];
    $no_rm = $_POST['no_rm'];
    $kd_dokter = $_POST['kd_dokter'];
    $diagnosa = $_POST['diagnosa'];

    $conn = new mysqli("localhost", "root", "", "rekam_medik_12060");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sqlstr = "INSERT INTO Perawatan (no_kamar, no_rm, kd_dokter, diagnosa) VALUES ('$no_kamar', '$no_rm', '$kd_dokter', '$diagnosa')";

    if ($conn->query($sqlstr) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sqlstr . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
