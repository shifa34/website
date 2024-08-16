<?php
    include 'koneksi.php';
    $page = isset($_GET['page']) ? $_GET['page'] : 'list';
    switch ($page) {
        case 'list' :
?>

<div class="row mb-3">
    <div class="col-md-3">
        <a href="index.php?p=prodi&page=input" class="btn btn-primary">Input Data Prodi</a>   
    </div> 
</div>
<table class="table table-responsive table-bordered table-hover">
    <thead class="table-secondary border border-light text-center align-middle">
        <tr>
            <th>NO</th>
            <th>Nama Prodi</th>               
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>    
    </thead>
<?php
    $tampil = mysqli_query($db, "SELECT * FROM prodi");
    $no = 1;
    while ($data = mysqli_fetch_array($tampil)) {
?>
            <tr>
                <td><?= $no?></td>
                <td><?= $data['nama_prodi']?></td>
                <td><?= $data['keterangan']?></td>                
                <td>
					<a href="index.php?p=prodi&page=edit&id_edit=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="proses_prodi.php?aksi=delete&id_hapus=<?= $data['id'] ?>"
						onclick="return confirm('Anda yakin menghapus data ini ?');" class="btn btn-danger">
                        <span data-feather="trash-2" class="align-text-bottom"></span>Hapus</a>
                    
                </td>
            </tr>
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
                <label class="col-form-label">Prodi Id</label>
                <div class="col-sm-9">
                    <input type="number" name="id_prodi" class="form-control" placeholder="Input Prodi Id" required>
                </div>
            </div>
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
                    <input type="submit" name="submit" class="btn btn-primary">
                    <input type="reset" name="reset" class="btn btn-secondary">
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
                    <input type="submit" id="submit" name="submit" value="Update" class="btn btn-primary">
                    <a href="index.php?p=prodi">
                        <input type="button" name="kembali" value="Kembali" class="btn btn-warning">
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