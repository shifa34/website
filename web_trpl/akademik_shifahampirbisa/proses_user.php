<?php
include 'Koneksi.php';
if ($_GET ['aksi']=='create') {
    //insert
                if(isset($_POST['submit'])){
                    $sql=mysqli_query($db,"INSERT INTO user(username, password, level)
                    VALUES('$_POST[username]','$_POST[password]','$_POST[level]')");
                    if($sql){
                        echo "<script>window.location='index.php?p=user'</script>" ; 
                    }
                }
}
elseif ($_GET ['aksi']=='update') {
    //update
                    if (isset($_POST['submit'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $level = $_POST['level'];

                        $sql=mysqli_query($db,"UPDATE user SET
                        username        ='$username',
                        password        ='$password',
                        level           ='$level', WHERE username = '$_GET[username]'");       //disini ubah wherenya ke nim lgsg
                        if ($sql) {
                            echo "<script>window.location='index.php?p=user'</script>";      
                        }
                    }
}
if ($_GET ['aksi']=='delete') {
    //delete
    $hapus = mysqli_query($db,"DELETE FROM user WHERE username='$_GET[id_hps]'");
    if ($hapus) {
        echo "<script>
        alert('Data Berhasil Dihapus !');
        document.location.href = 'index.php?p=user';
        </script>";     
    }
}
?>