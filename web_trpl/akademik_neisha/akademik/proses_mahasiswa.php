<?php
include 'koneksi.php';  

if($_GET['aksi']=='create') {
    if (isset($_POST['submit'])) {  
        $hobies=implode(',' , $_POST['hobi']);
        $tgl_lahir=$_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
       
        $sql=mysqli_query($db,"INSERT INTO mahasiswa(nim,nama_mhs,prodi,email,tgl_lahir,jekel,hobi,alamat) VALUES('$_POST[nim]','$_POST[nama]','$_POST[prodi]','$_POST[email]','$tgl_lahir','$_POST[jekel]','$hobies','$_POST[alamat]')");
        if($sql) {
            echo "<script>window.location='index.php?p=mhs&msg=sukses'</script>"; 
        }

    }
}

elseif ($_GET['aksi']=='update') {
    //update
    
        if (isset($_POST['submit'])) {
            $hobies=implode(",",$_POST['hobi']);
            $tgl_lahir=$_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
            $sql=mysqli_query($db,"UPDATE mahasiswa SET
            nama_mhs    ='$_POST[nama]',
            prodi    ='$_POST[prodi]',
            email       ='$_POST[email]',
            tgl_lahir   ='$tgl_lahir',
            jekel       ='$_POST[jk]',
            hobi        ='$hobies',
            alamat      ='$_POST[alamat]' WHERE nim='$_POST[nim]'");
            if ($sql) {
                echo "<script>window.location='index.php?p=mhs'</script>";     
            }
        }
    
}

elseif ($_GET['aksi']=='delete') {
    //delete
    $hapus=mysqli_query($db,"DELETE FROM mahasiswa WHERE nim='$_GET[id_hapus]'");
    if ($hapus) {
        header('location:index.php?p=mhs');
    }

}

