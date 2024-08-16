<?php
    session_start();
    include 'koneksi.php';
    $page = isset($_GET['page']) ? $_GET['page'] : 'list';
    switch ($page) {
        case 'list' :
?>

<?php if($_SESSION['level'] == 'admin') : ?>
<div class="row mb-3">
    <div class="col-md-3">
        <a href="index.php?p=mhs&page=input" class="btn btn-primary">Input Data Mahasiswa</a>   
    </div> 
</div>
<?php endif ?>



<table class="table table-responsive table-bordered table-hover">
    <thead class="table-secondary border border-light text-center align-middle">
        <tr>
            <th>NO</th>
            <th>Nama Mahasiswa</th>               
            <th>NIM</th>
            <th>Prodi</th>
            <th>Hobi</th>
            <th>Tgl Lahir</th>
            <th style="width:5%">Jenis Kelamin</th>
            <th>Alamat</th>
        <?php if ($_SESSION['level'] == 'admin') : ?>
            <th>Aksi</th>
        <?php endif ?>
        </tr>    
    </thead>
<?php
    $tampil = mysqli_query($db, "SELECT * FROM mahasiswa, prodi WHERE mahasiswa.prodi_id=prodi.id");
    $no = 1;
    while ($data = mysqli_fetch_array($tampil)) {
?>
        <tbody class="table table-info border border-light text-center align-middle">
            <tr>
                <td>
                    <?= $no?>
                </td>
                <td>
                    <?= $data['nama_mhs']?>
                </td>
                <td>
                    <?= $data['nim']?>
                </td>
                <td>
                    <?= $data['nama_prodi']?>
                </td>
                <td>
                    <?= $data['hobi']?>
                </td>
                <td>
                    <?= $data['tgl_lahir']?>
                </td>
                <td>
                    <?= $data['jk']?>
                </td>
                <td>
                    <?= $data['alamat']?>
                </td>
                <?php if ($_SESSION['level'] == 'admin') : ?>
                <td>
                    <div style="display: flex; width: 100%; justify-content: space-between; column-gap:5px">
                        <a style="width:50%" href="proses_mahasiswa.php?aksi=delete&id_hapus=<?= $data['nim'] ?>"><input type="button" name="hapus" value="Hapus" class="btn btn-danger col-12" onclick="return confirm('Yakin akan menghapus data?')"></a>
                        <a style="width:50%" href="index.php?p=mhs&page=edit&id_edit=<?= $data['nim'] ?>"><input type="button" name="edit" value="Edit" class="btn btn-warning col-12"></a>
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
<h2>Input Data Mahasiswa</h2>
<div class="row">
    <div class="col-md-6">
        <form action="proses_mahasiswa.php?aksi=create" method="POST">
            <div class="row mb-3">
                <label class="col-form-label">NIM</label>
                <div class="col-sm-9">
                    <input type="number" name="nim" class="form-control" placeholder="Input NIM" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" placeholder="Input Nama" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">Prodi</label>
                <div class="col-sm-9">
                    <select class="form-select" name="prodi">
                    <?php
                        $prodi=mysqli_query($db, "SELECT * FROM prodi");
                        while ($data_prodi = mysqli_fetch_array($prodi)) {
                            $terpilih = ($data_prodi['id'] == $data['prodi_id']) ? 'selected' : '';
                    ?>
                            <option value="<?= $data_prodi['id']?>" <?=$terpilih?> ><?= $data_prodi['nama_prodi'] ?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <select class="form-select" aria-label="Default select example" name="tgl">
                                <option selected>dd</selected>
                                <?php
                                    for($i=1;$i<=31;$i++){
                                    echo "<option value=$i>$i</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" aria-label="Default select example" name="bln">
                                <option selected>MM</selected>
                                <?php
                                    $namaBln = [1=>'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'];
                                    foreach ($namaBln as $key => $value) {
                                        echo "<option value=" . $key . ">$value</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" aria-label="Default select example" name="thn">
                                <option selected>YY</selected>
                                <?php
                                    for($i=2022;$i>=1970;$i--){
                                    echo "<option value=$i>$i</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input type="radio" name="jk" value="L" class="form-check-input" checked>
                        <label class="form-check-label">Laki-Laki</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jk" value="P" class="form-check-input">
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div> 
            </div>
            <div class="row mb-3">
                <label class="form-label">Hobi</label>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="membaca">
                        <label class="form-check-label" >Membaca</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="traveling">
                        <label class="form-check-label" for="flexCheckChecked">Traveling</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="ngoding">
                        <label class="form-check-label" for="flexCheckChecked">Ngoding</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <textarea name="alamat" class="form-control" rows="4" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label"></label>
                <div class="col-sm-9">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                    <input type="reset" name="reset" class="btn btn-warning">
                    <a href="index.php?p=mhs">
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

            $ambil = mysqli_query($db, "SELECT * FROM mahasiswa where nim='$_GET[id_edit]'");
            $data = mysqli_fetch_array($ambil);
            $tgl_lahir = explode("-", $data['tgl_lahir']);
            $hobies = explode(",", $data['hobi']);
?>
<h2>Edit Data Mahasiswa</h2>
<div class="row">
    <div class="col-md-6">
        <form action="proses_mahasiswa.php?aksi=update&id_edit=<?= $data['nim'] ?>" method="POST">
            <div class="row mb-3">
                <label class="ol-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" value="<?= $data['nama_mhs'] ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">NIM</label>
                <div class="col-sm-9">
                    <input type="number" name="nim" class="form-control" value="<?= $data['nim'] ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">Prodi</label>
                <div class="col-sm-9">
                    <select class="form-select" aria-label="Default select example" name="prodi">
                    <?php
						$prodi=mysqli_query($db, "SELECT * FROM prodi");
                        while ($data_prodi = mysqli_fetch_array($prodi)) {
                            $terpilih = ($data_prodi['id'] == $data['prodi_id']) ? 'selected' : '';
					?>
						    <option value="<?= $data_prodi['id'] ?>" <?=$terpilih?> ><?= $data_prodi['nama_prodi'] ?></option>
					<?php
					    }
					?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <select class="form-select" aria-label="Default select example" name="tgl">
                                <option value="<?= $tgl_lahir[2] ?>" selected><?= $tgl_lahir[2] ?></selected>
                                <?php
                                    for($i=1;$i<=31;$i++){
                                    echo "<option value=$i>$i</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                        <?php
                            $namaBln = [1=>'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'];
                        ?>
                            <select class="form-select" aria-label="Default select example" name="bln">
                                <option value="<?= $tgl_lahir[1] ?>" selected><?= $namaBln[intval($tgl_lahir[1])] ?></selected>
                                <?php 
                                    foreach ($namaBln as $key => $value) {
                                        echo "<option value=" . $key . ">$value</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" aria-label="Default select example" name="thn">
                                <option value="<?= $tgl_lahir[2] ?>" selected><?= $tgl_lahir[0] ?></selected>
                                <?php
                                    for($i=2022;$i>=1970;$i--){
                                    echo "<option value=$i>$i</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="jk" value="L" class="form-check-input" <?php if($data['jk'] == 'L') echo 'checked' ?> >
                        <label class="form-check-label">Laki-Laki</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jk" value="P" class="form-check-input" <?= ($data['jk'] == 'P')? 'checked' : '' ?> >
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div> 
            </div>
            <div class="row mb-3">
                <label class="form-label">Hobi</label>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="membaca" <?php if(in_array('membaca', $hobies)) echo 'checked' ?> >
                        <label class="form-check-label">Membaca</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="traveling" <?= (in_array('traveling', $hobies)) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="flexCheckChecked">Traveling</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="ngoding" <?= (in_array('ngoding', $hobies)) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="flexCheckChecked">Ngoding</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <textarea name="alamat" class="form-control" rows="4" required><?= $data['alamat'] ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label"></label>
                <div class="col-sm-9">
                    <input type="submit" id="submit" name="submit" value="Update" class="btn btn-success">
                    <a href="index.php?p=mhs">
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