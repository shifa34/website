<?php
    include 'koneksi.php';
    if($_GET['aksi']=="input_user"){
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $level = $_POST['level'];

            $sql = mysqli_query($db, "INSERT INTO user (username, password, level)
                                    VALUES ('$username','$password','$level)
                                ");

            if ($sql) {
                echo "
                <script>
                    window.location = 'index.php?p=user';
                </script>";
            } else {
                echo "
                <script>
                    alert('data gagal  disimpan !');
                </script>";
            }
        }
    }

    elseif($_GET['aksi'] == 'update'){
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $level = $_POST['level'];

            $sql = mysqli_query($db, "UPDATE  user  SET
                    username = '$username', 
                    password = '$password',
                    level = '$level'
                    WHERE username = '$_GET[username]'");

            if ($sql) {
                echo "
                <script>
                    window.location = 'index.php?p=user';
                </script>";
            } else {
                echo "
                <script>
                    alert('Data Gagal Diubah!');
                </script>";
            }
        }
    }

    elseif($_GET['aksi'] == 'delete'){
        $hapus = mysqli_query($db, "DELETE FROM user where username = '$_GET[id_hapus]'");

        if($hapus){
            echo "<script>
            alert('Data Berhasil Dihapus !');
            document.location.href = 'index.php?p=user';
            </script>";
        }
    }
?>