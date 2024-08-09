<!DOCTYPE html>
<html>
<body>

<h1>Input Kamar</h1>
<form action="inputkamar.php" method="post">
    No.Kamar: <input type="text" name="no_kamar" size="15" maxlength="5"><br/>
    Nama Kamar: <input type="text" name="nm_kamar" size="45" maxlength="40"><br/>
    Kelas: <input type="text" name="kelas" size="15" maxlength="15"><br/>
    Tarif: <input type="text" name="tarif" size="15" maxlength="15"><br/>
    <input type="submit" value="Simpan">
    <input type="reset" value="Reset">
</form>
<p><a href="menu3.php" target="main">Kembali Ke Menu Kamar</a></p>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_kamar = $_POST["no_kamar"];
    $nm_kamar = $_POST["nm_kamar"];
    $kelas = $_POST["kelas"];
    $tarif = $_POST["tarif"];

    $conn = new mysqli("localhost", "root", "", "rekam_medik_12060");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sqlstr = "INSERT INTO kamar (no_kamar, nm_kamar, kelas, tarif) VALUES ('$no_kamar', '$nm_kamar', '$kelas', '$tarif')";

    if ($conn->query($sqlstr) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sqlstr . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

