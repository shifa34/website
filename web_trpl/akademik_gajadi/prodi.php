<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Mahasiswa</h1>
</div>

<?php include 'koneksi.php'; ?>

<?php $page = isset($_GET['page']) ? $_GET['page'] : 'list';

    switch($page){
        case 'list':  
?>

<?php
    $prd = mysqli_query($db, "SELECT * FROM prodi");
?>

<body>
<body>
    <div class="container">
        <div class="row ">

            <h2>Data Prodi</h2>
            <!-- <div class="col-md-4 mb-2"> -->
            <div class="col-md-4">
                <a href="index.php?p=input_prd&page=input" class="btn btn-primary">Input Data Prodi</a>
            </div>
        </div>
        <!-- <table class="table table-bordered  table-hover table-responsive"> -->
        <table class="table table-bordered">
            <!-- <tr class="table-primary"> -->
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1  ?>
            <?php foreach ($prd as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td> <?= $data["nama_prodi"]; ?></td>
                <td> <?= $data["keterangan"]; ?></td>
                <td>
                    <a href="index.php?aksi=edit&page=list&id_edit=<?=$data["nama_prodi"]; ?>" class="btn btn-warning">Edit</a>
                    <a href="proses_prodi.php?aksi=delete&id_hapus=<?= $data["nama_prodi"]; ?>"
                        onclick="return confirm('Anda yakin akan menghapus ini?');" class="btn btn-danger"><span data-feather="trash-2" class="align-text-bottom"></span>Hapus</a>
                </td>
            </tr>
            <?php $i++  ?>
            <?php endforeach;  ?>
        </table>
    </div>
    
    <?php
        break;
        case 'input' :
    
    ?>
    <!-- <div class="container mt-3 "> -->
    <div class="container">
        <h2>Form Input Prodi</h2>
        <div class="row">
        <div class="col-md-4">
            
            <a href="index.php?p=prd">Lihat data</a>
            
                <!-- <form action="" method="post"> -->
                <form action="proses_prodi.php?aksi=create" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama </label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea rows="3" name="keterangan" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"></label>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $prodi = $_POST['keterangan'];

                    //query
                    $sql = mysqli_query($db, "INSERT INTO prodi (nama_prodi,keterangan)
                                            VALUES ('$nama','$prodi')");

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

    <?php
        break;
        case 'edit':
    ?>
    <!-- <div class="container mt-3 "> -->
    <div class="container">
        <h2>Form Edit Prodi</h2>
            <?php
            include 'koneksi.php';

            $edit = mysqli_query($db, "SELECT * FROM prodi WHERE id='$_GET[id_edit]'");
            $data = mysqli_fetch_array($edit);
            ?>

        <div class="col-md-4">
            <a href="index.php">Lihat data</a>
            <div class="row">
                <!-- <form action="" method="post"> -->
                <form action="proses_prodi.php?aksi=edit" method="post">
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
                        <input type="reset" class="btn btn-warning" name="reset" value="Reset">
                    </div>
                </form>
                <!-- </form> -->
                <?php
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $prodi = $_POST['keterangan'];

                    //query
                    $sql = mysqli_query($db, "UPDATE  prodi  SET
                            nama_prodi = '$nama', 
                            keterangan = '$prodi'
                            WHERE id = '$_GET[id_edit]'");

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
    <?php
        break;
            }
    ?>
<script src ="js/bootstrap,bundle.min.js"></script>
</body>