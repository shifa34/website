<?php
    include ("koneksi.php");
    if (isset($_POST['Submit'])) {
        $nama=$_POST['nama'];
        $email=$_POST['email'];
        $komentar=$_POST['komentar'];
        $sql=mysqli_query($db,"INSERT INTO tamu(nama,email,komentar)
        
        VALUES ('$nama','$email','$komentar')");
    
        if ($sql){
            echo "Terimakasih telah mengisi buku tamu<br>";
            echo "<a href=list.php>Tampilkan list tamu</a>";
        }
        
        else {
        echo "Proses input buku tamu,Gagal..";
        }
    }