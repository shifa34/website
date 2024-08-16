<?php
    include("koneksi.php");

    if ($_GET['aksi']=='create') {
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $level = $_POST['level'];

            $sql = mysqli_query($db,"INSERT INTO user(username, password, level)
                                     VALUES('$username','$password','$level')");
            
            if($sql){
                header('location:index.php?p=user');
            }
            else{
                echo "Gagal Menginputkan Data user";
            }
        }
    }

    elseif ($_GET['aksi']=='update') {
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $level = $_POST['level'];

            $sql = mysqli_query($db, "  UPDATE user
                                        SET username = '$username',
                                            password = '$password',
                                            level    = '$level'
                                        WHERE id = '$_GET[id_edit]' ");
            
            if ($sql){
                header('location:index.php?p=user');
            }
            else{
                echo "Gagal mengupdate data";
            }
        }
    }

    elseif ($_GET['aksi'] == 'delete') {
        $hapus = mysqli_query($db, "DELETE FROM user WHERE id='$_GET[id_hapus]'");
        if ($hapus) {
            header('Location:index.php?p=user');
        }
        else{
            echo "Gagal menghapus data";
        }
    }
?>