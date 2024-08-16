<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Mahasiswa</h1>
</div>

<?php
include 'koneksi.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'list';


switch ($page) {
    case 'list':
?>
<?php
        include 'koneksi.php';
        $mhs = mysqli_query($db, "SELECT * FROM mahasiswa inner join prodi on mahasiswa.prodi_id = prodi.id");
        ?>

<body>
    <div class="container">
        <div class="row ">

            <h2>Data Mahasiswa</h2>
            <div class="col-md-4">        <!-- <div class="col-md-4 mb-2">  -->
                <a href="index.php?p=mhs&page=input" class="btn btn-primary">Input Data Mahasiswa</a>
            </div>
        </div>
        <table class="table table-bordered  table-hover table-responsive">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach ($mhs as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td> <?= $data["nim"]; ?></td>
                <td> <?= $data["nama_mhs"]; ?></td>
                <td> <?= $data["nama_prodi"]; ?></td>
                <td> <?= $data["email"]; ?></td>
                <td> <?= $data["jekel"]; ?></td>
                <td>
                    <a href="index.php?p=mhs&page=edit&id_edit=<?= $data["nim"]; ?>" class=" btn btn-warning">Edit</span></a>
                    <a href=" proses_mahasiswa.php?aksi=delete&id_hapus=<?= $data["nim"]; ?>"
                        onclick="return confirm('Anda yakin menghapus data ini ?');" class="btn btn-danger">
                        <span data-feather="trash-2" class="align-text-bottom"></span>Hapus</a>
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
    <!-- <div class="container mt-3 "> -->
    <div class="container">
        <h2>Form Input Mahasiswa</h2>
        <div class="row">
            <div class="col-md-4">
            <form action="proses_mahasiswa.php?aksi=create" method="post">
            <a href="index.php?p=mhs">Lihat data</a>
            <div class="row"></div>
                <div class="mb-3">
                    <label class="form-label">NIM </label>
                    <input type="text" class="form-control" name="nim">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama </label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Prodi </label>
                    <!-- <div class="col-md-12"> -->
                        <select name="prodi" id="" class="form-select">
                            <option value="">--Pilih Prodi--</option>
                            <?php
                                $prodi = mysqli_query($db,"SELECT * from prodi");
                                while($data_prodi=mysqli_fetch_array($prodi)){
                            ?>
                            <option value="<?=$data_prodi['id']?>"><?=$data_prodi['nama_prodi']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    <!-- </div> -->
                </div>
                <div class="mb-3">
                    <label class="form-label">Email </label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <div class="row g-2">
                        <div class="col-md-3">
                            <select name="tgl" id="" class="form-select">
                                <option value="">DD</option>
                                <?php
                                        for ($i = 1; $i < 32; $i++) {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        }
                                        ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="bln" id="" class="form-select">
                                <option value="">MM</option>
                                <?php
                                        $bulan = [1 => "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sept", "Okt", "Nov", "Des"];
                                        // for ($i = 1; $i < 12; $i++) {
                                        //     echo  "<option value=$i> $i </option>";
                                        // }
                                        foreach ($bulan as $key => $namabulan) {
                                            echo "<option value=" . $key . "> $namabulan </option>";
                                        }

                                        ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="thn" id="" class="form-select">
                                <option value="">YYYY</option>
                                <?php
                                        // for ($i = 2022; $i > 1975; $i--) {
                                        $i = 2022;
                                        while ($i >= 1975) {
                                            echo "<option value=$i> $i </option>";
                                            $i--;
                                        }
                                        ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jekel" id="jekel1" value="L" checked>
                        <label class="form-check-label" for="jekel">
                            Laki - Laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jekel" id="jekel1" value="P">
                        <label class="form-check-label" for="jekel">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hobi </label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Menyanyi" name="hobi[]">
                        <label class="form-check-label" for="defaultCheck1">
                            Menyanyi
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Menonton" name="hobi[]">
                        <label class="form-check-label" for="defaultCheck1">
                            Menonton
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Membaca" name="hobi[]">
                        <label class="form-check-label" for="defaultCheck1">
                            Membaca
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea rows="3" name="alamat" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <input type="reset" class="btn btn-warning" name="reset" value="Reset">
                </div>
            </form>

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
        <!-- <div class="container mt-3 "> -->
        <div class="container">
            <h2>Form Edit Mahasiswa</h2>
            <?php
                include 'koneksi.php';

                $edit = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim='$_GET[id_edit]'");
                $data = mysqli_fetch_array($edit);
                $hobies = explode(',', $data['hobi']);
                $tgl_lahir = explode("-", $data['tgl_lahir']);
            ?>

            <div class="col-md-4">             
                <a href="index.php">Lihat data</a>
                <div class="row">
                    <form action="proses_mahasiswa.php?aksi=update" method="post">
                        <div class="mb-3">
                            <label class="form-label">NIM </label>
                            <input type="text" class="form-control" name="nim" value="<?= $data['nim']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama </label>
                            <input type="text" class="form-control" name="nama" value="<?= $data['nama_mhs']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prodi </label>
                            <!-- <div class="col-md-12"> -->
                                <select name="prodi" id="" class="form-select">
                                    <?php
                                        $prodi = mysqli_query($db,"SELECT * FROM prodi");
                                        while($data_prodi = mysqli_fetch_array($prodi)){
                                            $select = ($data_prodi['id']==$data_prodi['id']) ? 'selected' : '';
                                    ?>
                                    <option value="<?php $data_prodi['id'] ?>" <?=$select?>><?=$data_prodi['nama_prodi']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email </label>
                            <input type="email" class="form-control" name="email" value="<?= $data['email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <select name="tgl" id="" class="form-select">
                                        <option value="<?= $tgl_lahir[2] ?>"><?= $tgl_lahir[2] ?></option>
                                        <?php
                                                for ($i = 1; $i < 32; $i++) {
                                                    echo  '<option value="' . $i . '">' . $i . '</option>';
                                                }
                                                ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select name="bln" id="" class="form-select">
                                        <option value="<?= $tgl_lahir[1] ?>"><?= $tgl_lahir[1] ?></option>
                                        <?php
                                                $bulan = [1 => "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sept", "Okt", "Nov", "Des"];
                                                // for ($i = 1; $i < 12; $i++) {
                                                //     echo  "<option value=$i> $i </option>";
                                                // }
                                                foreach ($bulan as $key => $namabulan) {
                                                    echo  "<option value=" . $key . "> $namabulan </option>";
                                                }

                                                ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select name="thn" id="" class="form-select">
                                        <option value="<?= $tgl_lahir[0] ?>"><?= $tgl_lahir[0] ?></option>
                                        <?php
                                                // for ($i = 2022; $i > 1975; $i--) {
                                                $i = 2022;
                                                while ($i >= 1975) {
                                                    echo  "<option value=$i> $i </option>";
                                                    $i--;
                                                }
                                                ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jekel" value="L"
                                    <?php if ($data['jekel'] == 'L') echo 'checked' ?>>
                                <label class="form-check-label" for="jekel">Laki - Laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jekel" value="P"
                                    <?php if ($data['jekel'] == 'P') echo 'checked' ?>>
                                <label class="form-check-label" for="jekel">Perempuan</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hobi </label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Menyanyi" name="hobi[]"
                                    <?php if (in_array('Menyanyi', $hobies))  print 'checked' ?>>
                                <label class="form-check-label" for="defaultCheck1">Menyanyi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Menonton" name="hobi[]"
                                    <?php if (in_array('Menonton', $hobies))  print 'checked' ?>>
                                <label class="form-check-label" for="defaultCheck1">Menonton</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Membaca" name="hobi[]"
                                    <?php if (in_array('Membaca', $hobies))  print 'checked' ?>>
                                <label class="form-check-label" for="defaultCheck1">Membaca</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea rows="3" name="alamat" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"></label>
                            <input type="submit" class="btn btn-primary" name="submit" value="Update">
                            <input type="reset" class="btn btn-warning" name="reset" value="Reset">
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <?php
        break;
} ?>
<script src ="js/bootstrap,bundle.min.js"></script>