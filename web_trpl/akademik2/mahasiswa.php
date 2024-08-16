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
                <th>Jekel</th>
                <th>Aksi</th>
            </tr>
       
            <?php
                    include("Koneksi.php");
                    $tampil=mysqli_query($db,"SELECT * FROM mahasiswa");  // from mahasiswa,prodi where mahasiswa.prodi_id=prodi.id"); atau from mahasiswa inner join prodi on mahasiswa.prodi_id=prodi.id");
                    $no=1;
                    while ($data=mysqli_fetch_array($tampil)) {
            ?>
                    <tr>
                        <td> <?php echo $no; ?> </td>
                        <td><?php echo $data['nim']; ?></td>
                        <td><?php echo $data['nama_mhs']; ?></td>
                        <td><?php echo $data['prodi']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['jekel']; ?></td>
                        <td>
                            <a href="proses_mahasiswa.php?aksi=hapus&id_hapus=<?= $data['nim']?>" class = "btn btn-danger" 
                            onclick="return confirm ('Anda yakin akan menghapus ini?')"><span data-feather="trash-2" class="align-text-bottom"></span>Hapus</a>          <!--sama kek sebelumnya ubah jadi proses_mahasiswa/-->
                            <!-- ?= : php echo-->
                            <a href="index.php?p=mhs&page=edit&id_edit=<?=$data['nim']?>" class = "btn btn-warning">Edit</a>
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
                    <option value="MI">Manajemen Informatika</option>
                    <option value="TK">Teknik Komputer</option>
                    <option value="TRPL">Teknologi Rekayasa Perangkat Lunak</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control">
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
        
        <!--insert/-->
        <?php
            if(isset($_POST['submit'])){
                $hobies=implode(',',$_POST['hobi']);
                $tgl_lahir=$_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];

                $sql=mysqli_query($db,"INSERT INTO mahasiswa(nim,nama_mhs,prodi,email,tgl_lahir,jekel,hobi,alamat)
                VALUES('$_POST[nim]','$_POST[nama]','$_POST[prodi]','$_POST[email]','$tgl_lahir','$_POST[jekel]','$hobies','$_POST[alamat]')");
                if($sql){
                    //echo "Data berhasil disimpan";
                    //header('location:index.php?p=mhs');  ini tidak bisa pake yg lain
                    echo "<script>window.location='index.php?p=mhs'</script>" ;    //di direct aja
                }
                
                switch ($_POST['bln']) {
                    case '1': $namaBulan = "Januari"; break;
                    case '2': $namaBulan = "Februari"; break;
                    case '3': $namaBulan = "Maret"; break;
                    case '4': $namaBulan = "April"; break;
                    case '5': $namaBulan = "May"; break;
                    case '6': $namaBulan = "Juni"; break;
                    case '7': $namaBulan = "Juli"; break;
                    case '8': $namaBulan = "Agustus"; break;
                    case '9': $namaBulan = "September"; break;
                    case '10': $namaBulan = "Oktober"; break;
                    case '11': $namaBulan = "November"; break;
                    case '12': $namaBulan = "Desember"; break;
                }
            }
        ?>

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
                            <option value="<?= $data['prodi']?>" selected><?= $data['prodi']?></option>
                            <option value="">--pilih prodi--</option>
                            <option value="MI">Manajemen Informatika</option>
                            <option value="TK">Teknik Komputer</option>
                            <option value="TRPL">Teknologi Rekayasa Perangkat Lunak</option>
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
                        <a href="list_mhs.php"><input type="button" name="kembali" value="kembali" class="btn btn-warning"></a>
                    </div>
                </form>
                
                <!--update/-->
                <?php
                    if (isset($_POST['submit'])) {
                        $nim = $_POST['nim'];
                        $nama_mhs = $_POST['nama'];
                        $tgl_lahir = $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
                        $jekel = $_POST['jekel'];
                        $hobies=implode(',',$_POST['hobi']);
                        $sql=mysqli_query($db,"UPDATE mahasiswa SET
                        nim         ='$_POST[nim]',
                        nama_mhs    ='$_POST[nama]',
                        tgl_lahir   ='$_POST[tgl_lahir]',
                        jekel       ='$_POST[jekel]',
                        hobi        ='$hobies',
                        alamat      ='$_POST[alamat]' WHERE nim='$_GET[id_edit]");      
                        
                        if ($sql) {
                            echo "<script>window.location='index.php?p=mhs'</script>"; 
                           
                        }

                        switch ($_POST['bln']) {
                            case '1': $namaBulan = "Januari"; break;
                            case '2': $namaBulan = "Februari"; break;
                            case '3': $namaBulan = "Maret"; break;
                            case '4': $namaBulan = "April"; break;
                            case '5': $namaBulan = "May"; break;
                            case '6': $namaBulan = "Juni"; break;
                            case '7': $namaBulan = "Juli"; break;
                            case '8': $namaBulan = "Agustus"; break;
                            case '9': $namaBulan = "September"; break;
                            case '10': $namaBulan = "Oktober"; break;
                            case '11': $namaBulan = "November"; break;
                            case '12': $namaBulan = "Desember"; break;
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
                
</html>
                