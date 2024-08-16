<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User</h1>
</div>

<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
include 'koneksi.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'list';


switch ($page) {
    case 'list':
?>
<?php
        include 'koneksi.php';
        $user = mysqli_query($db, "SELECT * FROM user");
        ?>

<body>
    <div class="container">
        <div class="row ">

            <h2>Data User</h2>
            <div class="col-md-4 mb-2">
                <a href="index.php?p=user&page=input" class="btn btn-primary">Input Data User</a>
            </div>
        </div>
        <table class="table table-bordered  table-hover table-responsive">
            <tr class="table-primary">
                <th>Id</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Aksi</th>
                
            </tr>
            <?php $i = 1 ?>
            <?php foreach ($user as $data) : ?>
            <tr>
                <td> <?= $data["id"]; ?></td>
                <td> <?= $data["username"]; ?></td>
                <td> <?= $data["password"]; ?></td>
                <td> <?= $data["level"]; ?></td>
                <td>
                    <a href="index.php?p=user&page=edit&id_edit=<?= $data["username"]; ?>" class=" btn btn-warning"><span
                            data-feather="edit" class="align-text-bottom">edit</span></a>
                    <a href="proses_user.php?p=hapus_user&aksi=delete&id_hapus=<?= $data["username"]; ?>"
                        onclick="return confirm('Anda yakin akan menghapus data ini ?');" class="btn btn-danger"><span
                            data-feather="trash-2" class="align-text-bottom">Hapus</span></a>
                </td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </div>
    <?php
        break;
    case 'input':
        ?>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <div class="container mt-3 ">
        <div class="col-md-4">
            <h2>Form Input User</h2>
            <a href="index.php?p=user&page=input">Lihat data</a>
            <div class="row"></div>
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
            <?php
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $level = $_POST['level'];

                    $sql = mysqli_query($db, "INSERT INTO user (username,password,level)
                                            VALUES ('$username','$password','$level')
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
                ?>
        </div>
    </div>
    </div>
    <?php
        break;
    case 'edit':
        ?>
    <?php
            include 'koneksi.php';
            ?>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <body>
        <div class="container mt-3 ">
            <div class="col-md-4">
                <?php
                        include 'koneksi.php';

                        $edit = mysqli_query($db, "SELECT * FROM user WHERE username='$_GET[id_edit]'");
                        $data = mysqli_fetch_array($edit);

                        ?>
                <h2>Form Edit Mahasiswa</h2>
                <a href="index.php?p=user&page=input">Lihat data</a>
                <div class="row">
                    <form action="proses_user.php?aksi=update&username=<?=$_GET['id_edit']?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Username </label>
                            <input type="text" class="form-control" name="username" value="<?= $data['username']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" value="<?= $data['password']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Level</label>
                            <input type="text" class="form-control" name="level" value="<?= $data['level']; ?>">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                            <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <?php
        break;
} ?>