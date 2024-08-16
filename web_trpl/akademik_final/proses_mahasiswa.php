<?php
    include("koneksi.php");

    if ($_GET['aksi']=='create') {
        if (isset($_POST['submit'])) {

            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $prodi = $_POST['prodi'];               
            $tgl_lahir =  $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
            $jk = $_POST['jk'];
            $hobies = implode(',', $_POST['hobi']);
            $alamat = $_POST['alamat'];

            $sql = mysqli_query($db, "  INSERT INTO mahasiswa
                                        VALUES('$nim','$nama','$tgl_lahir','$jk','$hobies','$prodi','$alamat')");
            
            if($sql){
                header('location:index.php?p=mhs&msg=succes');
            }
            else{
                echo "Gagal Menginputkan Data Mahasiswa";
            }
        }
    }

    elseif ($_GET['aksi']=='update') {
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $prodi = $_POST['prodi'];            
            $tgl_lahir = $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
            $jk = $_POST['jk'];
            $hobies = implode(",", $_POST['hobi']);
            $alamat = $_POST['alamat'];

            $sql = mysqli_query($db, "  UPDATE mahasiswa
                                        SET nama_mhs    = '$nama',
                                            prodi_id    = '$prodi',
                                            tgl_lahir   = '$tgl_lahir',
                                            jk          = '$jk',
                                            hobi        = '$hobies',
                                            alamat      = '$alamat'
                                        WHERE nim = '$_GET[id_edit]' ");
            
            if ($sql){
                header('location:index.php?p=mhs');
            }
            else{
                echo "Gagal mengupdate data";
            }
        }
    }

    elseif ($_GET['aksi'] == 'delete') {
        $hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim='$_GET[id_hapus]'");
        if ($hapus) {
            header('Location:index.php?p=mhs');
        }
        else{
            echo "Gagal menghapus data";
        }
    }
?>