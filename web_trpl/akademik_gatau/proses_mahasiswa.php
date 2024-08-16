<?php
    include("koneksi.php");
//insert
    if ($_GET['aksi']=='create') {
        if (isset($_POST['submit'])) {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $prodi = $_POST['prodi'];
            $email = $_POST['email'];   
            $tgl_lahir =  $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
            $jk = $_POST['jk'];
            $hobies = implode(', ', $_POST['hobi']);
            $alamat = $_POST['alamat'];

            $sql = mysqli_query($db, "INSERT INTO mahasiswa
                                      VALUES('$nim','$nama','$prodi','$email','$tgl_lahir','$jk','$hobies','$alamat')");
            
            if($sql){
                echo "<script>window.location='index.php?p=mhs&msg=sukses'</script>";
            }
            else{
                echo "data gagal  diinput";
            }
        }
    }
//update
    elseif ($_GET['aksi']=='update') {
        if (isset($_POST['submit'])) {
			$nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $prodi = $_POST['prodi'];
            $email = $_POST['email'];
            $tgl_lahir = $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
            $jk = $_POST['jk'];
            $hobies = implode(", ", $_POST['hobi']);
            $alamat = $_POST['alamat'];

            $sql = mysqli_query($db, "  UPDATE mahasiswa
                                        SET nama_mhs    = '$nama',
                                            prodi_id    = '$prodi',
                                            email       = '$email',
                                            tgl_lahir   = '$tgl_lahir',
                                            jekel       = '$jk',
                                            hobi        = '$hobies',
                                            alamat      = '$alamat'
                                        WHERE nim = '$_GET[id_edit]' ");
            
            if ($sql){
                header('location:index.php?p=mhs');
            }
            else{
                echo "Data Gagal Diubah!";
            }
        }
    }
//delete
    elseif ($_GET['aksi'] == 'delete') {
        $hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim='$_GET[id_hapus]'");
        if ($hapus) {
            header('Location:index.php?p=mhs');
        }
        else{
            echo "Data gagal dihapus";
        }
    }
?>