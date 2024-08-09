<!DOCTYPE html>
<html>
<body>

<h1>Input Dokter</h1>
<form action="inputdokter.php" method="post">
		Kode Dokter : <input type="text" name="kd_dokter" size="15" maxlength="5"><br/>
		Nama Dokter : <input type="text" name="nm_dokter" size="45" maxlength="40"><br/>
		Alamat : <input type="text" name="alamat" size="55" maxlength="50"><br/>
		<input type="submit" value="Simpan">
		<input type="reset" value="Reset">
	</form>
<p><a href="menu1.php" target="main">Kembali Ke Menu Dokter</a></p>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$kd_dokter = $_POST["kd_dokter"];
	$nm_dokter = $_POST["nm_dokter"];
	$alamat = $_POST["alamat"];

    $conn = new mysqli("localhost", "root", "", "rekam_medik_12060");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sqlstr = "INSERT INTO inputdokter (kd_dokter, nm_dokter, alamat) VALUES ('$kd_dokter', '$nm_dokter', '$alamat')";

    if ($conn->query($sqlstr) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sqlstr . "<br>" . $conn->error;
    }

    $conn->close();
}
?>