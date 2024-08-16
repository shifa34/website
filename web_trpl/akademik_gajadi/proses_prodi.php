<?php
    include 'koneksi.php';
    //if($_GET['p']=="input_prd"){
    if($_GET['aksi']=="input"){
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $prodi = $_POST['keterangan'];

            $sql = mysqli_query($db, "INSERT INTO prodi (nama_prodi,keterangan)
                                    VALUES ('$nama','$prodi')
                                ");

            if ($sql) {
                echo "
                <script>
                    window.location = 'index.php?p=prd';
                </script>";
            } else {
                echo "
                <script>
                    alert('data gagal  disimpan !');
                </script>";
            }
        }
    }

    //elseif($_GET['p'] == 'edit_prd'){
    elseif($_GET['aksi'] == 'edit'){
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $prodi = $_POST['keterangan'];

            //query
            $sql = mysqli_query($db, "UPDATE  prodi  SET
                    nama_prodi = '$nama', 
                    keterangan = '$prodi'
                    WHERE nama = '$_GET[id_edit]'");

            if ($sql) {
                echo "
                <script>
                    window.location = 'index.php?p=prd';
                </script>";
            } else {
                echo "
                <script>
                    alert('Data Gagal Diubah!');
                </script>";
            }
        }
    }

    //elseif($_GET['p'] == 'hapus_prd'){
    elseif($_GET['aksi'] == 'delete'){
        $hapus = mysqli_query($db, "DELETE FROM prodi where nama_prodi = '$_GET[nama]");

        if($hapus){
            echo "<script>
            alert('Data Berhasil Dihapus !');
            document.location.href = 'index.php?p=mhs';
            </script>";
        }
    }
?>