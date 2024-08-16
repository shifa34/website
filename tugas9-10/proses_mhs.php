<?php
        include 'koneksi.php';
if($_GET['aksi']=='create'){
//insert
    if (isset($_POST['input'])){

        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jekel = $_POST['jekel'];
        $agama = $_POST['agama'];
        $sekolah = $_POST['sekolah'];

        $sql=mysqli_query ($db,"INSERT INTO siswa(nama,alamat,jekel,agama,sekolah) 
        VALUES ('$nama','$alamat','$jekel','$agama','$sekolah')");
        if($sql){
            //header('location:index.php?p=mhs');
            echo "<script> 
            window.location = 'index.php?p=mhs&msg=ok';
            </script>";
        }
    }
}

elseif($_GET['aksi']=='delete'){
//delete
    include 'koneksi.php';
        $hapus = mysqli_query($db, "DELETE FROM siswa WHERE nama='$_GET[id_hapus]'");
        if($hapus){
            echo "<script>
            alert('Data Berhasil Dihapus !');
            document.location.href = 'index.php?p=mhs';
            </script>";
        }
        else {
            print('Gagal menghapus data');
        }
}

?>