<?php include 'koneksi.php'; ?>

<body>
<h2> Data Mahasiswa </h2>
<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'list';
switch ($page) {
    case 'list':
?>

<div class="container">
    <div class="row mb-2">
        <?php
            $pesan = isset($_GET['msg']) ? $_GET['msg'] : '';
            if ($pesan == 'ok'){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil disimpan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            }
        ?>
        <div class="col-md-4">
            <a href="index.php?p=mhs&page=input" class="btn btn-primary mb-3">Input Data Mahasiswa</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <?php if ($_SESSION['level'] == 'admin') { ?>
                <th>Aksi</th>
                <?php } ?>
            </tr>
            <?php
                $ambil = mysqli_query($db, "SELECT mahasiswa.*, prodi.nama AS nama_prodi 
                                            FROM mahasiswa 
                                            INNER JOIN prodi ON mahasiswa.prodi_id = prodi.id");
                $no = 1;
                while ($data = mysqli_fetch_array($ambil)) {
            ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['nim'] ?></td>
                <td><?php echo $data['nama_mhs'] ?></td>
                <td><?php echo $data['nama_prodi'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['jekel'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <?php if ($_SESSION['level'] == 'admin') { ?>
                <td>
                    <a href="proses_mhs.php?aksi=delete&id_hapus=<?= $data['nim']?>" class="btn btn-danger" 
                    onclick="return confirm('Yakin akan menghapus data ?')">
                        <span data-feather="trash-2" class="align-text-bottom"></span> Hapus
                    </a>
                    <a href="index.php?p=mhs&page=edit&id_edit=<?= $data['nim']?>" class="btn btn-warning">Edit</a>
                </td>
                <?php } ?>
            </tr>
            <?php
                $no++;
                }
            ?>
        </table>
    </div>
</div>

<?php
    break;
    case 'input':
?>

<div class="container">
    <h2>Form Input Mahasiswa</h2>
    <div class="row">
        <div class="col-md-4">
            <form action="proses_mhs.php?aksi=create" method="post">
                <div class="mb-3">
                    <label class="form-label">Nim</label>
                    <input type="text" name="nim" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <select name="prodi" class="form-select">
                        <option value="">--Pilih Prodi--</option>
                        <?php
                            $prodi = mysqli_query($db, "SELECT * FROM prodi");
                            while ($data_prodi = mysqli_fetch_array($prodi)) {
                        ?>
                        <option value="<?= $data_prodi['id']?>"><?= $data_prodi['nama']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <div class="row g-2">
                        <div class="col-md-3">
                            <select name="tgl" class="form-select">
                                <option value="" selected>DD</option>
                                <?php
                                    for ($i = 1; $i <= 31; $i++) { 
                                        echo "<option value='$i'>$i</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="bln" class="form-select">
                                <option value="" selected>MM</option>
                                <?php
                                    $bulan = [1=>'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sep', 'Okt', 'Nov', 'Des'];
                                    foreach ($bulan as $key => $namaBulan) {
                                        echo "<option value='$key'>$namaBulan</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="thn" class="form-select">
                                <option value="" selected>YY</option>
                                <?php
                                    for ($i = 2022; $i >= 1995; $i--) { 
                                        echo "<option value='$i'>$i</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jekel" value="L">
                        <label class="form-check-label">Laki-Laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jekel" value="P">
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hobi</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Sholawat">
                        <label class="form-check-label">Menyanyi</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Mengaji">
                        <label class="form-check-label">Memabaca</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Memasak">
                        <label class="form-check-label">Memasak</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label"></label>
                    <input type="submit" name="input" class="btn btn-primary">
                    <input type="reset" name="reset" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    break;
    case 'edit':
?>
<div class="container">
    <?php
        $ambil = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim='$_GET[id_edit]'");
        $data = mysqli_fetch_array($ambil);
        $hobies = explode(",", $data['hobi']);
        $tgl_lahir = explode("-", $data['tgl_lahir']);
    ?>
    <h1>Edit Data Mahasiswa</h1>
    <div class="row">
        <div class="col-lg-6">
            <form action="proses_mhs.php?aksi=update" method="post">
                <div class="mb-2">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" name="nim" value="<?= $data['nim'] ?>" readonly>
                </div>
                <div class="mb-2">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $data['nama_mhs'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <select name="prodi" class="form-select">
                        <?php
                            $prodi = mysqli_query($db, "SELECT * FROM prodi");
                            while ($data_prodi = mysqli_fetch_array($prodi)) {
                                $terpilih = ($data['prodi_id'] == $data_prodi['id']) ? 'selected' : '';
                        ?>
                        <option value="<?= $data_prodi['id']?>" <?= $terpilih ?>><?= $data_prodi['nama']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Tanggal Lahir</label>
                    <div class="row g-2">
                        <div class="col-md-3">
                            <select name="tgl" class="form-select">
                                <option value="<?= $tgl_lahir[2] ?>"><?= $tgl_lahir[2] ?></option>
                                <?php  
                                    for ($i = 1; $i <= 31; $i++) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="bln" class="form-select">
                                <option value="<?= $tgl_lahir[1] ?>"><?= $tgl_lahir[1] ?></option>
                                <?php
                                    $nmBln = [1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agus', 9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'];
                                    foreach ($nmBln as $key => $value) {
                                        echo "<option value='$key'>$value</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="thn" class="form-select">
                                <option value="<?= $tgl_lahir[0] ?>"><?= $tgl_lahir[0] ?></option>
                                <?php
                                    for ($i = 2022; $i >= 1980; $i--) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <label class="form-label">Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jekel" value="L" <?= ($data['jekel'] == 'L') ? 'checked' : '' ?>>
                        <label class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jekel" value="P" <?= ($data['jekel'] == 'P') ? 'checked' : '' ?>>
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div>
                <div class="mb-2">
                    <label class="form-label">Hobi</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Sholawat" <?= in_array('Sholawat', $hobies) ? 'checked' : '' ?>>
                        <label class="form-check-label">Sholawatan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Mengaji" <?= in_array('Mengaji', $hobies) ? 'checked' : '' ?>>
                        <label class="form-check-label">Mengaji</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Memasak" <?= in_array('Memasak', $hobies) ? 'checked' : '' ?>>
                        <label class="form-check-label">Memasak</label>
                    </div>
                </div>
                <div class="mb-2">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3"><?= $data['alamat'] ?></textarea>
                </div>
                <div class="mb-2">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <input type="reset" class="btn btn-warning" name="reset" value="Reset">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    break;
}
?>
</body>
