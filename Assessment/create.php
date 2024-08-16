<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "mahasiswa_db");

if ($conn->connect_error) {
    die(json_encode(['pesan' => 'gagal', 'error' => $conn->connect_error]));
}

$nama = $_POST["nama"];
$email = $_POST["email"];
$alamat = $_POST["alamat"];
$tglLahir = $_POST["tglLahir"];

$sql = "INSERT INTO mahasiswa (nama, email, alamat, tglLahir) VALUES ('$nama', '$email', '$alamat', '$tglLahir')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['pesan' => 'sukses']);
} else {
    echo json_encode(['pesan' => 'gagal', 'error' => $conn->error]);
}

$conn->close();
?>
