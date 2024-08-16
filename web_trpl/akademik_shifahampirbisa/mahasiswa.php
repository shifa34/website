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
        <h1 class="h2">Mahasiswa</h1>
      </div>
   
<?php
    $page=isset($_GET['page']) ? $_GET['page'] : 'list';      //buat keadaaan default untuk list
    switch ($page){
        case 'list':
?>
    <div class = "container">
        <div class="row">
            <h2>List data Mahasiswa</h2>
            <div class="col-md-4">
                <a href="index.php?p=mhs&page=input" class="btn btn-primary"> Input data Mahasiswa</a>       <!-- ubah p dari "index.php?p=input_mhs"  /-->
            </div>
        </div>

        <table class="table table-bordered">
            <tr >
                <th>No</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
       
            <?php
                    include("Koneksi.php");
                    $mhs=mysqli_query($db,"SELECT * FROM mahasiswa INNER JOIN prodi ON mahasiswa.prodi_id=prodi.id "); //   "SELECT * FROM mahasiswa"
                    $no=1;
                    while ($data=mysqli_fetch_array($mhs)) {
            ?>
                    <tr>
                        <td> <?php echo $no; ?> </td>
                        <td><?php echo $data['nim']; ?></td>
                        <td><?php echo $data['nama_mhs']; ?></td>
                        <td><?php echo $data['prodi_id']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['jekel']; ?></td>
                        <td>
                            <a href="proses_mahasiswa.php?aksi=delete&id_hapus=<?= $data['nim'];?>" class = "btn btn-danger" 
                            onclick="return confirm ('Anda yakin akan menghapus ini?');"><span data-feather="trash-2" class="align-text-bottom"></span>Hapus</a>          <!--sama kek sebelumnya ubah jadi proses_mahasiswa/-->
                            <!-- ?= : php echo-->
                            <a href="index.php?p=mhs&page=edit&id_edit=<?=$data['nim'];?>" class = "btn btn-warning">Edit</a>
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
    <h2>Form Mahasiswa</h2>
    <div class="row">
        <div class="col-md-4">
        <form action="proses_mahasiswa.php?aksi=create" method="post">      <!--di action kkita panggil file proses_mahasiswa dengan paramaeter aksi itu create /-->
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <select name="prodi" class="form-select">
                    <option value="">--pilih prodi--</option>
                    <?php
                        $prodi=mysqli_query($db, "select * from prodi");
                        while($data_prodi=mysqli_fetch_array($prodi)){
                    ?> 
                    <option value="<?= $data_prodi['id']?>"><?=$data_prodi['nama_prodi']?></option>
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
                    <option value="">DD</option>
                <?php
                    for ($i=1; $i<=31 ; $i++) { 
                        echo "<option value=$i>$i</option>";
                    }
                ?>
                </select>
                </div>
                <div class="col-md-3">
                <select name="bln" class="form-select">
                    <option value="">MM</option>
                <?php
                    $bulan=[1=> 'jan','feb','mar','apr','mei','jun','jul','agus','sept','okt','nov','des'];
                    foreach ($bulan as $key => $namaBulan) {
                        echo "<option value =".$key.">$namaBulan</option>"; 
                    }

                    // for ($i=1; $i<=12 ; $i++) { 
                    //     echo "<option value=$i>$i</option>";
                    // }
                ?>
                </select>
                </div>
                <div class="col-md-3">
                <select name="thn" class="form-select">
                    <option value="">YYYY</option>
                <?php
                    for ($i=2022; $i>=1975 ; $i--) { 
                        echo "<option value=$i>$i</option>";
                    }
                ?>
                </select>
                </div>
                </div>    
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jekel" value="L" checked>  <!--checekd untuk nilai default biar terisi dulu -->
                    <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jekel" value="P">
                    <label class="form-check-label">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Hoby</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="nyanyi">
                    <label class="form-check-label">Bernyanyi</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="nonton">
                    <label class="form-check-label">Menonton</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="baca">
                    <label class="form-check-label">Membaca</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label"></label>
                <input type="submit" name="submit" class="btn btn-primary">
                <input type="reset" name="reset" class="btn btn-warning">
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
        <h2>Form Edit Mahasiswa</h2>
        <?php
            include 'Koneksi.php';
            $ambil=mysqli_query ($db, "SELECT * FROM mahasiswa WHERE nim='$_GET[id_edit]'"); 
            $data=mysqli_fetch_array($ambil);
            $hobies=explode(",", $data['hobi']);
            $tgl_lahir=explode("-", $data['tgl_lahir']);
        ?>

        <div class="col-md-4">
            <div class="row">
                <form action="proses_mahasiswa.php?aksi=update" method = "post">        <!-- sama seperti sebelumnya di bagian insert actionnya ubah jdi aksi=updaet parameternya/-->
                    
                    <div class="mb-3"> 
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" value="<?= $data['nim'] ?>" readonly>  
                    </div>
                
                    <div class="mb-3"> 
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama_mhs'] ?>">  
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <select name="prodi" class="form-select">
                            <?php
                                $prodi=mysqli_query($db,"select * from prodi");
                                while($data_prodi=mysqli_fetch_array($prodi)){
                                    $terpilih=($data['prodi_id']==$data_prodi['id']) ? 'selected' : '';
                            ?>
                                <option value="<?=$data_prodi['id']?>"><?=$terpilih?>><?= $data_prodi['nama_prodi']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="<?= $data['email']?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <div class="row g-2">
                        <div class="col-md-3">
                        <select name="tgl" class="form-select">
                            <option value="">DD</option>
                        <?php
                            for ($i=1; $i<=31 ; $i++) { 
                                echo "<option value=$i>$i</option>";
                            }
                        ?>
                        </select>
                        </div>
                        <div class="col-md-3">
                        <select name="bln" class="form-select">
                            <option value="">MM</option>
                        <?php
                            $bulan=[1=> 'jan','feb','mar','apr','mei','jun','jul','agus','sept','okt','nov','des'];
                            foreach ($bulan as $key => $namaBulan) {
                                echo "<option value =".$key.">$namaBulan</option>"; 
                            }

                            // for ($i=1; $i<=12 ; $i++) { 
                            //     echo "<option value=$i>$i</option>";
                            // }
                        ?>
                        </select>
                        </div>
                        <div class="col-md-3">
                            <select name="thn" class="form-select">
                                <option value="">YYYY</option>
                            <?php
                                for ($i=2022; $i>=1975 ; $i--) { 
                                    echo "<option value=$i>$i</option>";
                                }
                            ?>
                            </select>
                            </div>
                        </div>    
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jekel" value="L" <?php if ($data['jekel']=='L') echo 'checked'?>> 
                            <label class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jekel" value="P" <?= ($data['jekel']=='P') ? 'checked' : ''?>>
                            <label class="form-check-label">Perempuan</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hoby</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="nyanyi" <?php if (in_array('nyanyi',$hobies)) echo 'checked'?>>
                            <label class="form-check-label">Bernyanyi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="nonton" <?php if (in_array('nonton',$hobies)) echo 'checked'?>>
                            <label class="form-check-label" for="flexCheckChecked">Menonton</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="baca" <?php if (in_array('baca',$hobies)) echo 'checked'?>>
                            <label class="form-check-label">Membaca</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3"><?= $data['alamat'] ?></textarea>
                    </div>

                    <div class="mb-3"> 
                        <label class="form-label"></label>
                        <input type="submit" class="btn btn-primary" name="submit" value="Update">
                        <input type="button" name="reset" value="reset" class="btn btn-warning"></a>
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
                