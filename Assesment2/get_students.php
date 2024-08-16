<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_students");

if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

$query = "SELECT * FROM students";
$result = mysqli_query($koneksi, $query);

$data_mahasiswa = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data_mahasiswa[] = $row;
}

$json_data = json_encode($data_mahasiswa);

header('Content-Type: application/json');
echo $json_data;

mysqli_close($koneksi);
?>
