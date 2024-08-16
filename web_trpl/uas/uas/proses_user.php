<?php
    include 'koneksi.php';
    if($_GET['p']=="input_user"){
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password=md5($_POST['pass']);
            $confirm_password = md5($_POST['confirm_pass']);
            $level = $_POST['level'];
            $anggota = $_POST['anggota'];

            if($password == $confirm_password){ 
                //query
                $sql = mysqli_query($conn, "INSERT INTO user (id,username,password,level)
                                        VALUES ('$anggota','$username','$password','$level')
                                    ");
                if ($sql) {
                    echo "
                    <script>
                        window.location = 'index.php?p=user&msg=ok';
                    </script>";
                } else {
                    echo "
                    <script>
                        alert('data gagal  disimpan !');
                    </script>";
                }
            } elseif($password != $confirm_password){
                echo "
                    <script>
                        alert('Password tidak sama dengan Confirm Password!');
                        document.location.href = 'index.php?p=user&page=input';
                        </script>";
            } 
        }
    }

    elseif($_GET['p'] == 'edit_user'){
        include 'koneksi.php';
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password=md5($_POST['pass']);
            $confirm_password = md5($_POST['confirm_pass']);
            $level = $_POST['level'];

            if($password == $confirm_password){
                //query
                $sql = mysqli_query($conn, "UPDATE  user  SET
                username = '$username', 
                password = '$password',
                level = '$_POST[level]'
                WHERE id = '$_POST[id]'");

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
            }elseif($password != $confirm_password){
                echo "
                <script>
                    alert('Password tidak sama dengan Confirm Password!');
                    document.location.href = 'index.php?p=user&page=edit&id_edit=$_POST[id]';
                </script>";
            }else{
                //query
                $sql = mysqli_query($conn, "UPDATE  user  SET
                username = '$username', 
                level = '$_POST[level]'
                WHERE id = '$_POST[id]'");
            }
        }
    }

    elseif($_GET['p'] == 'hapus_user'){
        $hapus = mysqli_query($conn, "DELETE FROM user where id = '$_GET[id_hapus]'");

        if($hapus){
            echo "<script>
            alert('Data Berhasil Dihapus !');
            document.location.href = 'index.php?p=user';
            </script>";
        }
    }
?>
