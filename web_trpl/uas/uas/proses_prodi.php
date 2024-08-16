<?php
    include 'koneksi.php';
    if($_GET['p']=="input_prd"){
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $prodi = $_POST['keterangan'];

            //query
            $sql = mysqli_query($conn, "INSERT INTO prodi (nama_prodi,keterangan)
                                    VALUES ('$nama','$prodi')
                                ");
            if ($sql) {
                echo "
                <script>
                    window.location = 'index.php?p=prd&msg=ok';
                </script>";
            } else {
                echo "
                <script>
                    alert('data gagal  disimpan !');
                </script>";
            }
        }
    }

    elseif($_GET['p'] == 'edit_prodi'){
        include 'koneksi.php';
        if (isset($_POST['submit'])) {

            //query
            $sql = mysqli_query($conn, "UPDATE  prodi  SET
            nama_prodi = '$_POST[nama]', 
            keterangan = '$_POST[keterangan]'
            WHERE id_prodi = '$_POST[id]'");

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

    elseif($_GET['p'] == 'hapus_prd'){
        $hapus = mysqli_query($conn, "DELETE FROM prodi where nama_prodi = '$_GET[id_hapus]'");

        if($hapus){
            echo "<script>
            alert('Data Berhasil Dihapus !');
            document.location.href = 'index.php?p=prd';
            </script>";
        }
    }
?>