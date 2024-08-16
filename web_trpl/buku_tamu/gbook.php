<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class ="container">
        <h2>Input Buku Tamu</h2>
        <div class="col-md-4">
            <div class="row">
                <form method = "post">
                    <div class="mb-3"> 
                        <label class="form-label">Nama</label>
                        <input type="text" name = "nama" class ="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name = "email" class ="form-control">
                    </div>

                    <div class="mb-3"> 
                        <label class="form-label">Komentar</label>
                        <textarea name = "komentar" class ="form-control" rows=3></textarea>
                    </div>

                    <div class="mb-3"> 
                        <label class="form-label"></label>
                        <input type="submit" name = "submit" class ="btn btn-primary">

                        <label class="form-label"></label>
                        <input type="reset" name = "reset" class ="btn btn-warning">
                    </div>
                </form>

                <?php
                    include 'koneksi.php';

                    if (isset($_POST['submit'])) {

                        $nama=$_POST['nama'];
                        $email=$_POST['email'];
                        $komentar=$_POST['komentar'];
                        $sql=mysqli_query($db,"INSERT INTO tamu(nama,email,komentar) VALUES ('$nama','$email','$komentar')");
                    
                        if ($sql){
                            echo "Terimakasih telah mengisi buku tamu<br>";
                        }
                        
                        else {
                        echo "Proses input buku tamu,Gagal..";
                        }
                    }

                ?>
                <a href="list.php">List Buku Tamu</a>
            </div>
        </div>
    </div>

    <script src ="js/bootstrap,bundle.min.js"></script>
</body>
</html>