<?php
    include("koneksi.php");

    if ($_GET['aksi']=='create') {
        if (isset($_POST['submit'])) {
            $id_prodi = $_POST['id_prodi'];
            $nama_prodi = $_POST['nama_prodi'];
            $keterangan = $_POST['keterangan'];

            $sql = mysqli_query($db,"INSERT INTO prodi
                                     VALUES($id_prodi,'$nama_prodi','$keterangan')");
            
            if($sql){
                header('location:index.php?p=prodi');
            }
            else{
                echo "Gagal Menginputkan Data prodi";
            }
        }
    }

    elseif ($_GET['aksi']=='update') {
        if (isset($_POST['submit'])) {
            $nama_prodi = $_POST['prodi'];
            $keterangan = $_POST['keterangan'];

            $sql = mysqli_query($db, "  UPDATE prodi
                                        SET prodi    = '$nama_prodi',
                                            keterangan      = '$keterangan'
                                        WHERE id = '$_GET[id_edit]' ");
            
            if ($sql){
                header('location:index.php?p=prodi');
            }
            else{
                echo "Gagal mengupdate data";
            }
        }
    }

    elseif ($_GET['aksi'] == 'delete') {
        $hapus = mysqli_query($db, "DELETE FROM prodi WHERE id='$_GET[id_hapus]'");
        if ($hapus) {
            header('Location:index.php?p=prodi');
        }
        else{
            echo "Gagal menghapus data";
        }
    }
?>