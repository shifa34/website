<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "mahasiswa_db");

if ($conn->connect_error) {
    die(json_encode(['pesan' => 'gagal', 'error' => $conn->connect_error]));
}

$id = $_POST["id"];
$nama = $_POST["nama"];
$email = $_POST["email"];
$alamat = $_POST["alamat"];
$tglLahir = $_POST["tglLahir"];

$sql = "UPDATE mahasiswa SET nama='$nama', email='$email', alamat='$alamat', tglLahir='$tglLahir' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['pesan' => 'sukses']);
} else {
    echo json_encode(['pesan' => 'gagal', 'error' => $conn->error]);
}

$conn->close();
?>
