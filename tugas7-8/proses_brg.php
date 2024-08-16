<?php
if ($_GET['aksi'] == 'create') {
    // Database connection
    $db = mysqli_connect('localhost', 'root', '', 'db_barang');

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get form data
    $nama_merek = $_POST['nama_merek'];
    $warna = $_POST['warna'];
    $jumlah = $_POST['jumlah'];

    // Insert data into the database
    $query = "INSERT INTO printer (nama_merek, warna, jumlah) VALUES ('$nama_merek', '$warna', '$jumlah')";
    $result = mysqli_query($db, $query);

    // Redirect to index.php with a success message
    header("Location: index.php?msg=ok");

    // Close the database connection
    mysqli_close($db);
}
?>
