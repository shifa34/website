<?php
    if ($_GET ['aksi']=='delete') {
        //delete
        $hapus = mysqli_query($db,"DELETE FROM mahasiswa WHERE nim='$_GET[id_hapus]'");
        if ($hapus) {
            header('location:index.php?p=mhs');
            // echo "<script>window.location='index.php?p=mhs'</script>";        
        }
    }
?>