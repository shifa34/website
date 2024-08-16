<?php
    include 'koneksi.php';
    $hapus = mysqli_query($db, "DELETE FROM Tamu WHERE id='$_GET[id_hapus]' ");
    
    if($hapus){
        header('location:index.php?p=tamu');    //redirect
    }
    else {
        print('Gagal menghapus data');
    }
?>