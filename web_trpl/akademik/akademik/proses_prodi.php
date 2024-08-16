<?php
include 'koneksi.php';

if ($_GET['p'] == "input_prd") {
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $keterangan = $_POST['keterangan'];

        //query
        $sql = mysqli_query($db, "INSERT INTO prodi (nama, keterangan) VALUES ('$nama', '$keterangan')");

        if ($sql) {
            echo "
            <script>
                window.location = 'index.php?p=prodi&msg=ok';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal disimpan!');
            </script>";
        }
    }
} elseif ($_GET['p'] == 'edit_prodi') {
    if (isset($_POST['submit'])) {
        //query
        $sql = mysqli_query($db, "UPDATE prodi SET
        nama = '$_POST[nama]',
        keterangan = '$_POST[keterangan]'
        WHERE id = '$_POST[id]'");

        if ($sql) {
            echo "
            <script>
                window.location = 'index.php?p=prodi';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal diubah!');
            </script>";
        }
    }
} elseif ($_GET['p'] == 'hapus_prd') {
    $hapus = mysqli_query($db, "DELETE FROM prodi WHERE id = '$_GET[id_hapus]'");

    if ($hapus) {
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'index.php?p=prodi';
        </script>";
    }
}
?>
