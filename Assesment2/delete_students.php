<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_students");

if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

$id = $_GET['id'];

$query = "DELETE FROM students WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "Data berhasil dihapus.";
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
