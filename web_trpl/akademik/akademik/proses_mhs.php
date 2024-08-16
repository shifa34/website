<?php
        include 'koneksi.php';
if($_GET['aksi']=='create'){
//insert
    if (isset($_POST['input'])){

        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $email = $_POST['email'];
        $tgl_lahir=$_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
        $jekel = $_POST['jekel'];
        $hobies=implode(',' , $_POST['hobi']);
        $alamat=$_POST['alamat'];

        $sql=mysqli_query ($db,"INSERT INTO mahasiswa(nim,nama_mhs,prodi_id,email,tgl_lahir,jekel,hobi,alamat) 
        VALUES ('$nim','$nama','$prodi','$email','$tgl_lahir','$jekel','$hobies','$alamat')");
        if($sql){
            //header('location:index.php?p=mhs');
            echo "<script> 
            window.location = 'index.php?p=mhs&msg=ok';
            </script>";
        }
    }
}

elseif($_GET['aksi']=='update'){
//update
include 'koneksi.php';
        if (isset($_POST['submit'])) {
            $hobies=implode(",",$_POST['hobi']);
                $tgl_lahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];

                    $sql=mysqli_query($db,"UPDATE mahasiswa SET
                    nim         ='$_POST[nim]',
                    nama_mhs    ='$_POST[nama]',
                    prodi_id    = '$_POST[prodi]',
                    email       = '$_POST[email]',
                    tgl_lahir   ='$tgl_lahir',
                    jekel       ='$_POST[jekel]',
                    hobi        ='$hobies',
                    alamat      ='$_POST[alamat]' 
                    WHERE nim='$_POST[nim]'");
                    if ($sql) {
                        echo "<script>window.location='index.php?p=mhs&msg=ok'</script>"; 
                       
                    }
        }
}

elseif($_GET['aksi']=='delete'){
//delete
    include 'koneksi.php';
        $hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim='$_GET[id_hapus]'");
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