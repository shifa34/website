<?php
    include 'koneksi.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 'list';

    switch($page){
        case 'list':

            $user = mysqli_query($db, "SELECT * FROM user");
?>

<body>
    <div class="container">
        <div class="row ">
        <?php
            $pesan=isset($_GET['msg']) ? $_GET['msg'] : '';
            if ($pesan =='ok'){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil disimpan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            }
        ?>
            <h2>Data User</h2>
            <div class="col-md-4 mb-2">
                <a href="index.php?p=user&page=input" class="btn btn-primary">Input Data</a>
            </div>
        </div>
        <table class="table table-bordered  table-hover table-responsive">
            <tr class="table-primary">
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1  ?>
            <?php foreach ($user as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td> <?= $row["username"]; ?></td>
                <td> <?= $row["password"]; ?></td>
                <td> <?= $row["level"]; ?> </td>
                
                <td> 
                    <a href="proses_user.php?p=hapus_user&id_hapus=<?= $row["id"]; ?>"
                        onclick="return confirm('Yakin hapus data ?');" class="btn btn-danger"><span data-feather="trash-2" class="align-text-bottom"></span> Hapus</a>
                    <a href="index.php?p=user&page=edit&id_edit=<?=$row["id"]; ?>" class="btn btn-warning">Edit</a>
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

<div class="container mt-3 ">
        <div class="col-md-4">
            <h2>Form Input User</h2>
            <div class="row">
                <form action="proses_user.php?p=input_user" method="post">
                    <div class="mb-3">
                        <label class="form-label">Username </label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="pass">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_pass">
                    </div>
                    <div class="mb-3">
                    <label class="form-label"> Level </label>
                        <select name="level" class="form-select">
                        <option value="">--Pilih Level--</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
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
        case 'edit':
    ?>
    <div class="container mt-3 ">
        <div class="col-md-4">
            <?php
            include 'koneksi.php';

            $edit = mysqli_query($db, "SELECT * FROM user WHERE id='$_GET[id_edit]'");
            $data = mysqli_fetch_array($edit);

            ?>
            <h2>Form Edit</h2>
            <div class="row">
                <form action="proses_user.php?p=edit_user" method="post">
                <div class="mb-3">
                        <label class="form-label">No</label>
                        <input type="text" class="form-control" name="id" value="<?= $data['id'] ?>"readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username </label>
                        <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="pass">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_pass">
                    </div>
                    <div class="mb-3">
                    <label class="form-label"> Level </label>
                        <select name="level" class="form-select">
                        <?php
                            $user=mysqli_query($db,"SELECT * FROM user");
                            while($data_user=mysqli_fetch_array($user)){
                            $terpilih=($data['id']==$data_user['id']) ? 'selected' : '';
                        ?>
                            <option value="<?= $data_user['level']?>"<?= $terpilih ?>> <?=$data_user['level']?></option>

                        <?php
                        }
                        ?>
                        </select>
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
    }
?>
</body>