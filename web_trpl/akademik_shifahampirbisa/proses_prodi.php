<?php
include 'Koneksi.php';
if ($_GET ['aksi']=='create') {
    //insert
                if(isset($_POST['submit'])){
                    $sql=mysqli_query($db,"INSERT INTO prodi(nama_prodi,keterangan)
                    VALUES('$_POST[nama]','$_POST[keterangan]')");
                    if($sql){
                        echo "<script>window.location='index.php?p=prd';</script>"; 
                    }
                }
}
elseif ($_GET ['aksi']=='update') {
    //update
                    if (isset($_POST['submit'])) {
                        $nama = $_POST['nama'];
                        $prodi = $_POST['keteranngan'];

                        $sql=mysqli_query($db,"UPDATE prodi SET
                        nama        ='$nama',
                        prodi    ='$prodi' WHERE nama = '$_GET[id_edit]'");       //disini ubah wherenya ke nim lgsg
                        if ($sql) {
                            echo "<script>window.location='index.php?p=prd'</script>";      
                        }
                    }
}
if ($_GET ['aksi']=='delete') {
    //delete
    $hapus = mysqli_query($db,"DELETE FROM prodi WHERE nama='$_GET[nama_prodi]'");
    if ($hapus) {
        echo "<script>
        alert('Data Berhasil Dihapus !');
        document.location.href = 'index.php?p=mhs';
        </script>";     
    }
}
?>