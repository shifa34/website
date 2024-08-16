<?php
        include 'koneksi.php';
if($_GET['aksi']=='create'){
//insert
    if (isset($_POST['input'])){

        $nama_merek = $_POST['nama_merek'];
        $warna = $_POST['warna'];
        $jumlah = $_POST['jumlah'];

        $sql=mysqli_query ($db,"INSERT INTO printer(nama_merek,warna,jumlah) 
        VALUES ('$nama_merek','$warna','$jumlah')");
        if($sql){
            //header('location:index.php?p=mhs');
            echo "<script> 
            window.location = 'index.php?p=brg&msg=ok';
            </script>";
        }
    }
}
?>