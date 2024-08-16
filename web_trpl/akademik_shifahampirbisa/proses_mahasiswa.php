<?php
include 'Koneksi.php';
if ($_GET ['aksi']=='create') {
    //insert
                if(isset($_POST['submit'])){
                    $nim = $_POST['nim'];
                    $nama = $_POST['nama'];
                    $prodi = $_POST['prodi'];
                    $email = $_POST['email'];
                    $hobies=implode(',',$_POST['hobi']);
                    $tgl_lahir=$_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];

                    $sql=mysqli_query($db,"INSERT INTO mahasiswa(nim,nama_mhs,prodi_id,email,tgl_lahir,jekel,hobi,alamat)
                    VALUES('$_POST[nim]','$_POST[nama]','$_POST[prodi]','$_POST[email]','$tgl_lahir','$_POST[jekel]','$hobies','$_POST[alamat]')");
                    if($sql){
                        echo 
                        "<script>
                            //document.location.href = 'index.php?p=mhs';
                            window.location = 'index.php?p=mhs';
                        </script>";
                    } else {
                        echo 
                        "<script>
                            alert('data gagal  disimpan !');
                        </script>";
                        //echo "Data berhasil disimpan";
                        //header('location:index.php?p=mhs');  ini tidak bisa pake yg lain
                        //echo "<script>window.location='index.php?p=mhs&msg=ok'</script>" ;    //di direct aja
                    }
                    
                    // switch ($_POST['bln']) {
                    //     case '1': $namaBulan = "Januari"; break;
                    //     case '2': $namaBulan = "Februari"; break;
                    //     case '3': $namaBulan = "Maret"; break;
                    //     case '4': $namaBulan = "April"; break;
                    //     case '5': $namaBulan = "May"; break;
                    //     case '6': $namaBulan = "Juni"; break;
                    //     case '7': $namaBulan = "Juli"; break;
                    //     case '8': $namaBulan = "Agustus"; break;
                    //     case '9': $namaBulan = "September"; break;
                    //     case '10': $namaBulan = "Oktober"; break;
                    //     case '11': $namaBulan = "November"; break;
                    //     case '12': $namaBulan = "Desember"; break;
                    // }
                }
}
elseif ($_GET ['aksi']=='update') {
    //update
                    if (isset($_POST['submit'])) {
                        $nim = $_POST['nim'];
                        $nama_mhs = $_POST['nama'];
                        $prodi = $_POST['prodi'];
                        $email = $_POST['email'];
                        $tgl_lahir = $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
                        $jekel = $_POST['jekel'];
                        $hobies=implode(',',$_POST['hobi']);
                        $alamat = $_POST['alamat'];
                        $sql=mysqli_query($db,"UPDATE mahasiswa SET
                        nim         ='$_POST[nim]',
                        nama_mhs    ='$_POST[nama]',
                        prodi    ='$_POST[prodi]',
                        email    ='$_POST[email]',
                        tgl_lahir   ='$_POST[tgl_lahir]',
                        jekel       ='$_POST[jekel]',
                        hobi        ='$hobies',
                        alamat      ='$_POST[alamat]' WHERE nim='$_POST[nim]' ");       //disini ubah wherenya ke nim lgsg  WHERE '$_POST['nim]'
                        
                        if ($sql) {
                            echo "
                            <script>
                                window.location = 'index.php?p=mhs';
                            </script>";
                        } else {
                            echo "
                            <script>
                                alert('Data Gagal Diubah!');
                            </script>";
                        }

                    //     switch ($_POST['bln']) {
                    //         case '1': $namaBulan = "Januari"; break;
                    //         case '2': $namaBulan = "Februari"; break;
                    //         case '3': $namaBulan = "Maret"; break;
                    //         case '4': $namaBulan = "April"; break;
                    //         case '5': $namaBulan = "May"; break;
                    //         case '6': $namaBulan = "Juni"; break;
                    //         case '7': $namaBulan = "Juli"; break;
                    //         case '8': $namaBulan = "Agustus"; break;
                    //         case '9': $namaBulan = "September"; break;
                    //         case '10': $namaBulan = "Oktober"; break;
                    //         case '11': $namaBulan = "November"; break;
                    //         case '12': $namaBulan = "Desember"; break;
                    //     }
                    // }
                    }
}
elseif ($_GET ['aksi']=='delete') {
    //delete
    $hapus = mysqli_query($db,"DELETE FROM mahasiswa WHERE nim='$_GET[id_hapus]'");
    if ($hapus) {
        echo "
            <script>
                alert('Data Berhasil Dihapus !');
                document.location.href = 'index.php?p=mhs';
            </script>";
        // header ('location:index.php?p=mhs');
    }
}
?>