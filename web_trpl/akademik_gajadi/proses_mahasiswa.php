<?php
include 'koneksi.php';
if ($_GET['aksi'] == 'create') {
    //insert
    if (isset($_POST['submit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $email = $_POST['email'];
        $tgl_lahir = $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
        $jekel = $_POST['jekel'];
        $hobies = implode(',', $_POST['hobi']);
        $alamat = $_POST['alamat'];

        $sql = mysqli_query($db, "INSERT INTO mahasiswa (nim,nama_mhs,prodi_id,email,tgl_lahir,jekel,hobi,alamat)
                            VALUES ('$nim','$nama','$prodi','$email', '$tgl_lahir','$jekel','$hobies','$alamat')
                        ");
        if ($sql) {
            echo "
        <script>
            //document.location.href = 'index.php?p=mhs';
            window.location = 'index.php?p=mhs';
        </script>";
        } else {
            echo "
        <script>
            alert('data gagal  disimpan !');
        </script>";
        }
    }
} elseif ($_GET['aksi'] == 'update') {
    //update
    if (isset($_POST['submit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $email = $_POST['email'];
        $jekel = $_POST['jekel'];
        $hobies = implode(",", $_POST['hobi']);
        $tgl_lahir = $_POST['thn'] . "-" . $_POST['bln'] . "-" . $_POST['tgl'];
        $alamat = $_POST['alamat'];

        $sql = mysqli_query($db, "UPDATE  mahasiswa  SET
                nim = '$nim', 
                nama_mhs = '$nama', 
                prodi = '$prodi',
                email = '$email',
                tgl_lahir = '$tgl_lahir', 
                jekel = '$jekel',
                hobi = '$hobies',
                alamat = '$alamat' 
                WHERE nim = '$nim'");

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
    }
} elseif ($_GET['aksi'] == 'delete') {
    //delete
    $hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim ='$_GET[id_hapus]'");

    if ($hapus) {
        echo "
            <script>
                alert('Data Berhasil Dihapus !');
                document.location.href = 'index.php?p=mhs';
            </script>";
    }
    else{
        echo "Gagal menghapus data";
    }
}