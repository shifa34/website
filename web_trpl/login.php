<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Form Mahasiswa</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Login"></td>
            </tr>
        </table>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $nama=strtolower($_POST['nama']);
            if( $nama == 'admin' && $_POST['password'] == '12345'){
                echo "<script>alert('Selamat Datang')</script>";
            }
            else {
                echo "<script>alert('Username or Password is INVALID')</script>";
            }
        }
    ?>
</body>
</html>