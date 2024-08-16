<?php
    include 'koneksi.php';
    $page = isset($_GET['page']) ? $_GET['page'] : 'list';
    switch ($page) {
        case 'list' :
?>

<div class="row mb-3">
    <div class="col-md-3">
        <a href="index.php?p=user&page=input" class="btn btn-primary">Input Data user</a>   
    </div> 
</div>
<table class="table table-responsive table-bordered table-hover">
    <thead class="table-secondary border border-light text-center align-middle">
        <tr>
            <th>NO</th>
            <th>Username</th>               
            <th>Level</th>
            <th style="width:20%">Aksi</th>
        </tr>    
    </thead>
<?php
    $tampil = mysqli_query($db, "SELECT * FROM user");
    $no = 1;
    while ($data = mysqli_fetch_array($tampil)) {
?>
        <tbody class="table table-info border border-light text-center align-middle">
            <tr>
                <td>
                    <?= $no?>
                </td>
                <td>
                    <?= $data['username']?>
                </td>
                <td>
                    <?= $data['level']?>
                </td>                
                <td>
                    <div style="display: flex; width: 100%; justify-content: space-around; column-gap:5px">
                        <a style="width:80%" href="proses_user.php?aksi=delete&id_hapus=<?= $data['id'] ?>"><input type="button" name="hapus" value="Hapus" class="btn btn-danger col-12" onclick="return confirm('Yakin akan menghapus data?')"></a>
                        <a style="width:80%" href="index.php?p=user&page=edit&id_edit=<?= $data['id'] ?>"><input type="button" name="edit" value="Edit" class="btn btn-warning col-12"></a>
                    </div>
                </td>
            </tr>
        </tbody>
<?php
        $no++;
    }
?>
</table>
<?php
        break;
        case 'input' :
?>
<h2>Input Data user</h2>
<div class="row">
    <div class="col-md-6">
        <form action="proses_user.php?aksi=create" method="POST">
            <div class="row mb-3">
                <label class="col-form-label">username</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" placeholder="Input username" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">password</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" placeholder="Input password" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">Level</label>
                <div class="col-sm-9">
                    <select class="form-select" aria-label="Default select example" name="level">                    
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label"></label>
                <div class="col-sm-9">
                    <input type="submit" name="submit" class="btn btn-success" value="submit">
                    <input type="reset" name="reset" class="btn btn-warning">
                    <a href="index.php?p=user">
                        <input type="button" name="kembali" value="Kembali" class="btn btn-primary">
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
        break;
        case 'edit':

            $ambil = mysqli_query($db, "SELECT * FROM user where id='$_GET[id_edit]'");
            $data = mysqli_fetch_array($ambil);
?>
<h2>Edit Data user</h2>
<div class="row">
    <div class="col-md-6">
        <form action="proses_user.php?aksi=update&id_edit=<?= $data['id'] ?>" method="POST">
            <div class="row mb-3">
                <label class="col-form-label">user Id</label>
                <div class="col-sm-9">
                    <input type="number" name="user_id" class="form-control" value="<?= $data['id']?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="ol-form-label">username</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" value="<?= $data['username'] ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">password</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" placeholder="Input Password Baru" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">Level</label>
                <div class="col-sm-9">
                    <select class="form-select" aria-label="Default select example" name="level">
                    <?php
						$user=mysqli_query($db, "SELECT * FROM user");
                        while ($data_user = mysqli_fetch_array($user)) {
                            $terpilih = ($data_user['id'] == $data['user_id']) ? 'selected' : '';
					?>
						    <option value="<?= $data_user['username'] ?>" <?=$terpilih?> ><?= $data_user['username'] ?></option>
					<?php
					    }
					?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label"></label>
                <div class="col-sm-9">
                    <input type="submit" id="submit" name="submit" value="Update" class="btn btn-success">
                    <a href="index.php?p=user">
                        <input type="button" name="kembali" value="Kembali" class="btn btn-primary">
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
        break;
    }
?>