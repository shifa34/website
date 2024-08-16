<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Buku</h1>
      </div>
   
<?php
    $page=isset($_GET['page']) ? $_GET['page'] : 'list';      //buat keadaaan default untuk list
    switch ($page){
        case 'list':
?>
    <div class = "container">
        <div class="row">
        <?php
            if($_SESSION['level']=='admin'){
          ?>
            <div class="col-md-4">
                <a href="index.php?p=buku&page=input" class="btn btn-primary mb-3"> Tambah Buku</a>
            </div>
            <?php
                }
            ?>
        </div>
        <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <!-- <th>No</th> -->
                        <th>Id </th>
                        <th>Judul</th>
                        <th>Pengarang </th> 
                        <th>Penerbit </th>
                        <th>Tahun Terbit</th>
                        <th>ISBN</th> 
                        <!-- <th>Jumlah Buku</th>  -->
                        <th>Lokasi</th> 
                        <th>Tgl Input</th> 
                        <?php
                            if($_SESSION['level']=='admin'){
                        ?>
                        <th>Aksi</th>
                        <?php 
                            }
                        ?>
                    </tr>
                </thead>     

            <?php
                    include "koneksi.php";
                    $buku=mysqli_query($conn,"SELECT * FROM buku"); 
                    
                    if (!$buku) {
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    }else{
                    $no=1;
                    while ($data=mysqli_fetch_array($buku)) {
            ?>
                    <tr>
                        
                        <td><?php echo $data['id_buku']; ?></td>
                        <td><?php echo $data['judul_buku']; ?></td>
                        <td><?php echo $data['pengarang_buku']; ?></td>
                        <td><?php echo $data['penerbit_buku']; ?></td>
                        <td><?php echo $data['tahun_terbit']; ?></td>
                        <td><?php echo $data['isbn']; ?></td>
                        <!-- <td><php echo $data['jumlah_buku']; ></td> -->
                        <td><?php echo $data['lokasi']; ?></td>
                        <td><?php echo $data['tgl_input']; ?></td>
                        <?php
                            if($_SESSION['level']=='admin'){
                        ?>
                        <td>
                    <a href="index.php?p=buku&page=edit&id_edit=<?=$data["id_buku"]; ?>" class="btn btn-warning">Edit</a>
                    <a href="proses_buku.php?aksi=delete&id_hapus=<?= $data["id_buku"]; ?>"
                        onclick="return confirm('Yakin hapus data ?');" class="btn btn-danger"><span data-feather="trash-2" class="align-text-bottom"></span> Hapus</a>
                </td>
                     <?php
                            }
                     ?>   
                    </tr>
                <?php
                // $no++;
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
        <form action="proses_buku.php?aksi=create" method="post">   
            
            <div class="mb-3">
                <label class="small mb-1" for="judul_buku">Judul Buku</label>
                <input class="form-control"  name="judul_buku" type="text"/>
            </div>
            <div class="mb-3">
                <label class="small mb-1" for="pengarang_buku">Pengarang Buku</label>
                <input class="form-control"  name="pengarang_buku" type="text"/>
            </div>
            <div class="mb-3">
                <label class="small mb-1" for="penerbit_buku">Penerbit Buku</label>
                <input class="form-control"  name="penerbit_buku" type="text"/>
            </div>
            <div class="mb-3">
                <label class="small mb-1" for="tahun_terbit">Tahun Terbit Buku</label>
                <input class="form-control"  name="tahun_terbit" type="text"/>
            </div>
            <div class="mb-3">
                <label class="small mb-1" for="isbn">ISBN</label>
                <input class="form-control" name="isbn" type="text"/>
            </div>
            <!-- <div class="mb-3">
                <label class="small mb-1" for="jumlah_buku">Jumlah Buku</label>
                <input class="form-control" name="jumlah_buku" type="text"/>
            </div> -->
           
            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <select name="lokasi" class="form-select">
                <option value="Rak1">Rak 1</option>
                <option value="Rak2">Rak 2</option>
                <option value="Rak3">Rak 3</option>
        </select>
            </div>

            <div class="mb-3">
                <label for="tgl_input">Tanggal Input</label>
                <input type="date" name="tgl_input" id="tgl_input" class="form-control">
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
        <h2>Edit Buku</h2>
        <?php
            include 'koneksi.php';
            $ambil=mysqli_query ($conn, "SELECT * FROM buku WHERE id_buku='$_GET[id_edit]'"); 
            $data=mysqli_fetch_array($ambil);
        ?>

        <div class="col-md-4">
            <div class="row">
                <form action="proses_buku.php?aksi=edit" method = "post">                          
                    <div class="mb-3"> 
                        <label class="form-label">ID Buku</label>
                        <input type="text" class="form-control" name="id_buku" value="<?= $data['id_buku'] ?>" readonly>  
                    </div>
                    <div class="mb-3"> 
                        <label class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" name="judul_buku" value="<?= $data['judul_buku'] ?>">  
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pengarang Buku</label>
                        <input type="text" name="pengarang_buku" value="<?= $data['pengarang_buku']?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penerbit Buku</label>
                        <input type="text" name="penerbit_buku" value="<?= $data['penerbit_buku']?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" value="<?= $data['tahun_terbit']?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ISBN</label>
                        <input type="text" name="isbn" value="<?= $data['isbn']?>" class="form-control">
                    </div>

                    <!-- <div class="mb-3">
                        <label class="form-label">Jumlah Buku</label>
                        <input type="text" name="jumlah_buku" value="<?= $data['jumlah_buku']?>" class="form-control">
                    </div> -->

                    </div> 
                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <select name="lokasi" class="form-select">
                        <?php
                            $buku=mysqli_query($conn,"SELECT * FROM buku");
                                while($data_buku=mysqli_fetch_array($buku)){
                                    $terpilih=($data['lokasi']==$data_buku['lokasi']) ? 'selected' : '';
                                ?>
                                <option value="<?= $data_buku['lokasi']?>"<?= $terpilih ?>> <?=$data_buku['lokasi']?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>
                    <div class="mb-2">
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                <input type="Reset" class="btn btn-warning" name="reset" value="Reset">
                
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
                