<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
    body {
        background-color: aliceblue;
    }
</style>

<body>
    <div class="container mt-3 ">
        <div class="col-md-4">
            <h2>Form Input Prodi</h2>
            <a href="list_mhs.php">Lihat data</a>
            <div class="row">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama </label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea rows="3" name="keterangan" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $prodi = $_POST['keterangan'];

                    //query
                    $sql = mysqli_query($con, "INSERT INTO prodi (nama,keterangan)
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
                ?>
            </div>
        </div>
    </div>
</body>

</html>