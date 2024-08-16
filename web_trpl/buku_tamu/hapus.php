<?php
    include ("Koneksi.php");
    $hapus = mysqli_query($db, "DELETE FROM tamu WHERE id='$_GET[id_hapus]'");
        if ($hapus){
            header("location:list.php"); //redirect --> mengalihkan halaman ke halaman lain
        } 
        