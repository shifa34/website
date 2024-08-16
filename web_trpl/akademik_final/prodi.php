<?php
    include 'koneksi.php';
    $page = isset($_GET['page']) ? $_GET['page'] : 'list';
    switch ($page) {
        case 'list' :
?>
<?php if($_SESSION['level'] === 'admin') : ?>
<div class="row mb-3">
    <div class="col-md-3">
        <a href="index.php?p=prodi&page=input" class="btn btn-primary">Input Data Prodi</a>   
    </div> 
</div>
<?php endif ?>
<table class="table table-responsive table-bordered table-hover">
    <thead class="table-secondary border border-light text-center align-middle">
        <tr>
            <th>NO</th>
            <th>Nama Prodi</th>               
            <th>Keterangan</th>
            <?php if($_SESSION['level'] === 'admin') : ?>
            <th style="width:20%">Aksi</th>
            <?php endif ?>
        </tr>    
    </thead>
<?php
    $tampil = mysqli_query($db, "SELECT * FROM prodi");
    $no = 1;
    while ($data = mysqli_fetch_array($tampil)) {
?>
        <tbody class="table table-info border border-light text-center align-middle">
            <tr>
                <td>
                    <?= $no?>
                </td>
                <td>
                    <?= $data['nama_prodi']?>
                </td>
                <td>
                    <?= $data['keterangan']?>
                </td>                
                <?php if($_SESSION['level'] === 'admin') : ?>
                <td>
                    <div style="display: flex; width: 100%; justify-content: space-around; column-gap:5px">
                        <a style="width:80%" href="proses_prodi.php?aksi=delete&id_hapus=<?= $data['id'] ?>"><input type="button" name="hapus" value="Hapus" class="btn btn-danger col-12" onclick="return confirm('Yakin akan menghapus data?')"></a>
                        <a style="width:80%" href="index.php?p=prodi&page=edit&id_edit=<?= $data['id'] ?>"><input type="button" name="edit" value="Edit" class="btn btn-warning col-12"></a>
                    </div>
                </td>
                <?php endif ?>
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
<h2>Input Data prodi</h2>
<div class="row">
    <div class="col-md-6">
        <form action="proses_prodi.php?aksi=create" method="POST">            
            <div class="row mb-3">
                <label class="col-form-label">Nama Prodi</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_prodi" class="form-control" placeholder="Input Nama Prodi" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">Keterangan</label>
                <div class="col-sm-9">
                    <textarea name="keterangan" class="form-control" rows="4" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label"></label>
                <div class="col-sm-9">
                    <input type="submit" name="submit" class="btn btn-success" value="submit">
                    <input type="reset" name="reset" class="btn btn-warning">
                    <a href="index.php?p=prodi">
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

            $ambil = mysqli_query($db, "SELECT * FROM prodi where id='$_GET[id_edit]'");
            $data = mysqli_fetch_array($ambil);
?>
<h2>Edit Data prodi</h2>
<div class="row">
    <div class="col-md-6">
        <form action="proses_prodi.php?aksi=update&id_edit=<?= $data['id'] ?>" method="POST">
            <div class="row mb-3">
                <label class="col-form-label">Prodi Id</label>
                <div class="col-sm-9">
                    <input type="number" name="id_prodi" class="form-control" value="<?= $data['id']?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="ol-form-label">Nama Prodi</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_prodi" class="form-control" value="<?= $data['nama_prodi'] ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">Keterangan</label>
                <div class="col-sm-9">
                    <textarea name="keterangan" class="form-control" rows="4" required><?= $data['keterangan'] ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label"></label>
                <div class="col-sm-9">
                    <input type="submit" id="submit" name="submit" value="Update" class="btn btn-success">
                    <a href="index.php?p=prodi">
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