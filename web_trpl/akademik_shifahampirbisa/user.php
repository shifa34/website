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
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User</h1>
      </div>
   
<?php
    $page=isset($_GET['page']) ? $_GET['page'] : 'list';      //buat keadaaan default untuk list
    switch ($page){
        case 'list':
?>
    <div class = "container">
        <div class="row">
            <h2>List data Prodi</h2>
            <div class="col-md-4">
                <a href="index.php?p=mhs&page=input" class="btn btn-primary"> Input data Prodi</a>       <!-- ubah p dari "index.php?p=input_mhs"  /-->
            </div>
        </div>

        <table class="table table-bordered">
            <tr >
                <th>Id</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
       
            <?php
                    include("Koneksi.php");
                    $user=mysqli_query($db,"SELECT * FROM user "); //   "SELECT * FROM mahasiswa"
                    $no=1;
                    while ($data=mysqli_fetch_array($user)) {
            ?>
                    <tr>
                        <td> <?= $data["id"]; ?></td>
                        <td> <?= $data["username"]; ?></td>
                        <td> <?= $data["password"]; ?></td>
                        <td> <?= $data["level"]; ?></td>
                        <td>
                            <a href="proses_user.php?aksi=delete&id_hapus=<?= $data['username']?>" class = "btn btn-danger" 
                            onclick="return confirm ('Anda yakin akan menghapus ini?')"><span data-feather="trash-2" class="align-text-bottom"></span>Hapus</a>          <!--sama kek sebelumnya ubah jadi proses_mahasiswa/-->
                            <!-- ?= : php echo-->
                            <a href="index.php?p=prd&page=list&id_edit=<?=$data['nama_prodi']?>" class = "btn btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                 ?>
        </table>
    </div>
<?php
            break;
        case 'input':
?>

<div class="container">
    <h2>User</h2>
    <a href="index.php?p=user&page=input">Lihat data</a>
    <div class="row">
        <div class="col-md-4">
        <form action="index.php?p=user&page=input" method="post">
            <div class="mb-3">
                <label class="form-label">Username </label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label class="form-label">Password </label>
                <input type="text" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label">Level</label>
                <input type="text" class="form-control" name="level">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
            </div>
        </form>
        
        <!--udah dipindahkan ke baigan insert proses_mahasiswa/-->

        </div>
    </div>
</div>
<?php
        break;
    case 'edit' :
?>
    <div class ="container">
        <h2>Form Edit Prodi</h2>
        <?php
            include 'Koneksi.php';
            $ambil=mysqli_query ($db, "SELECT * FROM prodi WHERE id='$_GET[id_edit]'"); 
            $data=mysqli_fetch_array($ambil);
        ?>

        <div class="col-md-4">
            <div class="row">
                <form action="proses_prodi.php?aksi=update" method = "post">        <!-- sama seperti sebelumnya di bagian insert actionnya ubah jdi aksi=updaet parameternya/-->
                        
                    <div class="mb-3"> 
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama_prodi'] ?>">  
                    </div>

                    <div class=" mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea rows="3" name="keterangan" class="form-control"><?= $data['keterangan']; ?></textarea>
                    </div>

                    <div class="mb-3"> 
                        <label class="form-label"></label>
                        <input type="submit" class="btn btn-primary" name="submit" value="Update">
                        <input type="button" name="kembali" value="kembali" class="btn btn-warning"></a>
                    </div>
                </form>
                
                <!-- udah dipindahkan ke bagian update di proses_mahasiswa/-->

            </div>
        </div>
    </div>
<?php
    break;
                }
?>

<script src ="js/bootstrap,bundle.min.js"></script>

</body>
                
</html>
                