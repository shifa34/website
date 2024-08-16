<?php
$page=isset($_GET['page']) ? $_GET['page'] : 'list';    //ternary
switch ($page) {
    case 'list':
?>

<div class="container">
        <div class="row mb-2">
            <?php
                $pesan=isset($_GET['msg']) ? $_GET['msg'] : '';
                if ($pesan=='sukses') {
            ?>

            <div class="alert alert-success" role="alert">
                Data berhasil disimpan !
            </div>
            <?php
                }
            ?>
            <div class="col-md-4">
                <a href="index.php?p=mhs&page=input" class="btn btn-primary"><span data-feather="plus" class="align-text-bottom"></span> Input Mahasiswa</a>
            </div>
        </div>
            <table class="table table-bordered table-hover">
            <thead class="table-secondary border border-light text-center align-middle">
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Jekel</th>
                    <th>Prodi</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
                <?php
                    include 'koneksi.php';
                    $ambil=mysqli_query($db,"SELECT * FROM mahasiswa INNER JOIN prodi ON mahasiswa.prodi=prodi.id");
                    $no=1;
                    while($data=mysqli_fetch_array($ambil)) {
                ?>
               
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['nim']?></td>
                    <td><?php echo $data['nama_mhs']?></td>
                    <td><?php echo $data['jekel']?></td>
                    <td><?php echo $data['prodi']?></td>
                    <td><?php echo $data['email']?></td>
                    <td>
                        <a href="proses_mahasiswa.php?aksi=delete&id_hapus=<?= $data['nim'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ?')">Hapus</a>
                        <a href="index.php?p=mhs&page=edit&id_edit=<?= $data['nim'] ?>" class="btn btn-warning">Edit</a>
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
   
    <div class="row">
        <div class="col-md-6">
        <form action="proses_mahasiswa.php?aksi=create" method="post">
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
                    $prodi=mysqli_query($db,"SELECT * FROM prodi");
                    while($data_prodi=mysqli_fetch_array($prodi)) {
                    ?>
                    <option value="<?= $data_prodi['id']?>"><?= $data_prodi['prodi']?></option>
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
                    //for ($i=1; $i <=31 ; $i++) { 
                        $i=1;
                        do {
                        echo "<option value=$i>$i</option>";
                        $i++;
                    }
                    while($i <=31);
                    ?>    
                </select>
                </div>
                <div class="col-md-3">
                <select name="bln" class="form-select">
                    <option value="" selected>MM</option>
                <?php       
                    //for ($i=1; $i <=12 ; $i++) { 
                        $bulan=[1=>'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agus','Sep','Okt','Nov','Des'];
                       foreach($bulan as $key => $namaBulan) {
                            echo "<option value=".$key.">$namaBulan</option>";
                       } 
                        
                    
                    
                    ?>    
                </select>
                </div>
                <div class="col-md-3">
                <select name="thn" class="form-select">
                    <option value="" selected>YY</option>
                <?php       
                    for ($i=2022; $i >=1975 ; $i--) { 
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
                    <input class="form-check-input" type="radio" name="jekel" value="L" checked>
                    <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jekel" value="P">
                    <label class="form-check-label">Perempuan</label>
                </div>

            </div>
            <div class="mb-3">
                <label class="form-label">Hobi</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="Membaca"> 
                    <label class="form-check-label">Membaca</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="Olahraga"> 
                    <label class="form-check-label">Olahraga</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="Travelling"> 
                    <label class="form-check-label">Travelling</label>
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
        
        </div>
    </div>
</div>
<?php
        break;
    case 'edit' :
?>

<div class="container">
    <?php
            include 'koneksi.php';
            $ambil=mysqli_query($db,"SELECT * FROM mahasiswa WHERE nim='$_GET[id_edit]'");
            $data=mysqli_fetch_array($ambil);
            $hobies=explode(",", $data['hobi']);
            $tgl_lahir=explode("-", $data['tgl_lahir']);
        ?>
       
        <div class="row">
            <div class="col-lg-6">
            <form action="proses_mahasiswa.php?aksi=update" method="post">
            <div class="mb-2">
                <label class="form-label">Nim</label>
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
                        $prodi=mysqli_query($db,"SELECT * FROM prodi");
                        while($data_prodi=mysqli_fetch_array($prodi)) {
                            $terpilih=($data_prodi['id']==$data['prodi_id']) ? 'selected' : '';
                    ?>
                    <option value="<?= $data_prodi['id']?>" <?= $terpilih ?>><?= $data_prodi['prodi']?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="<?= $data['email']?>" class="form-control">
            </div>
            <div class="mb-2">
                <label class="form-label">Tanggal Lahir</label>
                <div class="row g-2">
                <div class="col-md-3">
                <select name="tgl" class="form-select">
                    <option value="<?= $tgl_lahir[2]?>" selected><?= $tgl_lahir[2]?></option>
                    <?php  
                    //for ($i=1; $i <=31 ; $i++) { 
                        $i=1;
                        do {
                        echo "<option value=$i>$i</option>";
                        $i++;
                    }  
                    while($i <=31);
                    ?>
                </select>
                </div>
                <div class="col-md-3">
                <select name="bln" class="form-select">
               
                    <?php  
                        $nmBln=[1=>'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agus','Sep','Okt','Nov','Des'];
                        foreach ($nmBln as $key => $value) {
                           $terpilih=($tgl_lahir[1]== $key) ? 'selected' : '';
                           echo "<option value=$key $terpilih>$value</option>";
                       }
                        
                    ?>
                </select>
                </div>
                <div class="col-md-3">
                <select name="thn" class="form-select">
                <option value="<?= $tgl_lahir[0]?>" selected><?= $tgl_lahir[0]?></option>
                    <?php  
                    for ($i=2022; $i >=1980 ; $i--) { 
                        echo "<option value=$i>$i</option>";
                    }  
                    ?>
                </select>
                </div>
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jk" value="L" <?php if ($data['jekel']=='L') echo 'checked'?>>
                    <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jk" value="P" <?= ($data['jekel']=='P') ? 'checked' : ''?>>
                    <label class="form-check-label">Perempuan</label>
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Hobi</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="Membaca" <?php if (in_array('Membaca',$hobies)) echo 'checked'?> >
                    <label class="form-check-label" >
                        Membaca
                    </label>
                    </div>
                    
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="Olahraga" <?php if (in_array('Olahraga',$hobies)) echo 'checked'?>>
                    <label class="form-check-label" for="flexCheckChecked">
                    Olahraga
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="Travelling" <?php if (in_array('Travelling',$hobies)) echo 'checked'?>> 
                    <label class="form-check-label">Travelling</label>
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows=3><?= $data['alamat'] ?></textarea>
            </div>
            <div class="mb-2">
                <input type="submit" class="btn btn-primary" name="submit" value="Update">
                
                
            </div>
             </form>
             
        </div>     
       </div>     
    </div>     

<?php
        break;
}

?>

