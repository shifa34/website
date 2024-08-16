<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Anggota</h1>
      </div>
   
<?php
    $page=isset($_GET['page']) ? $_GET['page'] : 'list';      //buat keadaaan default untuk list
    switch ($page){
        case 'list':
?>
    <div class = "container">
        <div class="row">
            <div class="col-md-4">
                <a href="index.php?p=agt&page=input" class="btn btn-primary mb-3">Tambah Anggota</a>
            </div>
        </div>
        <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Prodi</th> 
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th> 
                        <th>Aksi</th>
                    </tr>
                </thead>     

            <?php
                    include "koneksi.php";
                    $agt=mysqli_query($conn,"SELECT * FROM anggota INNER JOIN prodi ON anggota.id_prodi=prodi.id_prodi"); 
                    
                    if (!$agt) {
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    }else{
                    $no=1;
                    while ($data=mysqli_fetch_array($agt)) {
            ?>
                    <tr>
                        <td><?php echo $no; ?> </td>
                        <td><?php echo $data['nim']; ?></td>
                        <td><?php echo $data['nama_anggota']; ?></td>
                        <td><?php echo $data['nama_prodi']; ?></td>
                        <td><?php echo $data['tempat_lahir']; ?></td>
                        <td><?php echo $data['tgl_lahir']; ?></td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                        <td>
                    <a href="index.php?p=agt&page=edit&id_edit=<?=$data["nim"]; ?>" class="btn btn-warning">Edit</a>
                    <a href="proses_anggota.php?aksi=delete&id_hapus=<?= $data["nim"]; ?>"
                        onclick="return confirm('Yakin hapus data ?');" class="btn btn-danger"><span data-feather="trash-2" class="align-text-bottom"></span> Hapus</a>
                </td>
                        
                    </tr>
                <?php
                $no++;
                }
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
        <div class="col-md-4">
        <form action="proses_anggota.php?aksi=create" method="post">   
            <div class="mb-3">
                <label class="small mb-1" for="nim">NIM</label>
                <input class="form-control" id="nim" name="nim" type="number"/>
            </div>
            <div class="mb-3">
                <label class="small mb-1" for="nama_anggota">Nama Anggota</label>
                <input class="form-control" id="nama_anggota" name="nama_anggota" type="text"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <select name="prodi" class="form-select">
                    <option value="">--pilih prodi--</option>
                    <?php
                        $prodi=mysqli_query($conn, "select * from prodi");
                        while($data_prodi=mysqli_fetch_array($prodi)){
                    ?> 
                    <option value="<?= $data_prodi['id_prodi']?>"><?=$data_prodi['nama_prodi']?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input class="form-control" name="tempat_lahir" type="text"/>
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
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" checked>  <!--checekd untuk nilai default biar terisi dulu -->
                    <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="P">
                    <label class="form-check-label">Perempuan</label>
                </div>
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
    <div class ="container">
        <h2>Edit Anggota</h2>
        <?php
            include 'koneksi.php';
            $ambil=mysqli_query ($conn, "SELECT * FROM anggota WHERE nim='$_GET[id_edit]'"); 
            $data=mysqli_fetch_array($ambil);
            $tgl_lahir=explode("-", $data['tgl_lahir']);
        ?>

        <div class="col-md-4">
            <div class="row">
                <form action="proses_anggota.php?aksi=edit" method = "post">                          
                    <div class="mb-3"> 
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" value="<?= $data['nim'] ?>" readonly>  
                    </div>
                    <div class="mb-3"> 
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama_anggota" value="<?= $data['nama_anggota'] ?>">  
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Prodi</label>
                        <select name="prodi" class="form-select">
                        <?php
                            $prodi=mysqli_query($conn,"SELECT * FROM prodi");
                                while($data_prodi=mysqli_fetch_array($prodi)){
                                    $terpilih=($data['id_prodi']==$data_prodi['id_prodi']) ? 'selected' : '';
                                ?>
                                <option value="<?= $data_prodi['id_prodi']?>"<?= $terpilih ?>> <?=$data_prodi['nama_prodi']?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="<?= $data['tempat_lahir']?>" class="form-control">
                    </div>

                    <div class="mb-2">
                <label class="form-label">Tanggal Lahir</label>
                <div class="row g-2">
                <div class="col-md-3">
                <select name="tgl" class="form-select">
                    <option value="<?= $tgl_lahir[2]?>"><?= $tgl_lahir[2]?></option>
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
                <option value="<?= $tgl_lahir[1]?>"><?= $tgl_lahir[1]?></option>
                    <?php  
                        $nmBln=[1=>'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agus','Sep','Okt','Nov','Des'];
                        
                       foreach ($nmBln as $key => $value) {
                           echo "<option value=$key>$value</option>";
                       }
                        
                    ?>
                </select>
                </div>
                <div class="col-md-3">
                <select name="thn" class="form-select">
                <option value="<?= $tgl_lahir[0]?>"><?= $tgl_lahir[0]?></option>
                    <?php  
                    for ($i=2022; $i >=1980 ; $i--) { 
                        echo "<option value=$i>$i</option>";
                    }  
                    ?>
                </select>
                </div>
                </div>
            </div>
                    
                    </div> 
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" <?php if ($data['jenis_kelamin']=='L') echo 'checked'?>> 
                            <label class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" <?= ($data['jenis_kelamin']=='P') ? 'checked' : ''?>>
                            <label class="form-check-label">Perempuan</label>
                        </div>
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
                