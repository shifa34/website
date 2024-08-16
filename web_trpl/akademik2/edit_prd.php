<?php
include 'koneksi.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
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
            <?php
            include 'koneksi.php';

            $edit = mysqli_query($con, "SELECT * FROM prodi WHERE id='$_GET[id_edt]'");
            $data = mysqli_fetch_array($edit);

            ?>
            <h2>Form Edit Prodi</h2>
            <a href="index.php">Lihat data</a>
            <div class="row">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama </label>
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama_prodi']; ?>">
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea rows="3" name="keterangan" class="form-control"><?= $data['keterangan']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
                    </div>
                </form>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $prodi = $_POST['keterangan'];

                    //query
                    $sql = mysqli_query($con, "UPDATE  prodi  SET
                            nama_prodi = '$nama', 
                            keterangan = '$prodi'
                            WHERE id = '$_GET[id_edt]'");

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

                ?>
            </div>
        </div>
    </div>
</body>

</html>