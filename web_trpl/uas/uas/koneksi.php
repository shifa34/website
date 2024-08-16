
<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $nama_database = "db_perpustakaan";

    $conn = mysqli_connect($server, $user, $password, $db_perpustakaan);
    if ( !$conn ){
        die("Gagal terhubung dengan database : " . mysqli_connect_error());
    }
?>
