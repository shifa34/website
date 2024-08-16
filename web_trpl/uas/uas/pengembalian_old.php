<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pengembalian</h1>
      </div>
   
<?php
    $page=isset($_GET['page']) ? $_GET['page'] : 'list';      //buat keadaaan default untuk list
    switch ($page){
        case 'list':
?>
    <div class = "container">
        <div class="row">
            <div class="col-md-4">
                <a href="index.php?p=pengembalian&page=input" class="btn btn-primary mb-3"> Tambah Data </a>
            </div>
        </div>
        <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <!-- <th>No</th> -->
                        <th>ID Pengembalian</th>
                        <th>ID Peminjaman </th>
                        <th>Tanggal Pinjam </th> 
                        <th>Tanggal Kembali </th> 
                        <th>Tanggal Dikembalikan </th> 
                        <th>Keterangan </th>
                        <th>Aksi</th>
                    </tr>
                </thead>     

            <?php
                    include "koneksi.php";
                    $pengembalian=mysqli_query($conn,"SELECT * FROM pengembalian INNER JOIN 
                                peminjaman ON pengembalian.id_peminjaman = peminjaman.id_peminjaman"); 
                    
                    if (!$pengembalian) {
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    }else{
                    $no=1;
                    while ($data=mysqli_fetch_array($pengembalian)) {
            ?>
                    <tr>
                        
                        <td><?php echo $data['id_pengembalian']; ?></td>
                        <td><?php echo $data['id_peminjaman']; ?></td>
                        <td><?php echo $data['tgl_pinjam']; ?></td>
                        <td><?php echo $data['tgl_kembali']; ?></td>
                        <td><?php echo $data['tgl_dikembalikan']; ?></td>
                        <td><?php echo $data['keterangan']; ?></td>
                        <td>
                    <a href="index.php?p=pengembalian&page=edit&id_edit=<?=$data["id_pengembalian"]; ?>" class="btn btn-warning">Edit</a>
                    <a href="proses_pengembalian.php?aksi=delete&id_hapus=<?= $data["id_pengembalian"]; ?>"
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
        <form action="proses_pengembalian.php?aksi=create" method="post"> 
           
            <div class="mb-3">
                <label class="form-label"> ID Peminjaman </label>
                    <select name="peminjaman" class="form-select">
                        <option value="">--Pilih Peminjaman--</option>
                            <?php
                                $peminjaman=mysqli_query($conn,"SELECT * FROM peminjaman");
                                while($data_peminjaman=mysqli_fetch_array($peminjaman)){
                            ?>
                        <option value="<?= $data_peminjaman['id_peminjaman']?>"><?=$data_peminjaman['id_peminjaman']?></option>
                        <?php
                        }
                    ?>
                    </select>
            </div>

            <div class="mb-3">
                <label class="small mb-1" for="pengarang_buku">Tanggal Dikembalikan</label>
                <input type="date" name="tgl_dikembalikan" class="form-control">
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
        <h2>Edit Transaksi</h2>
        <?php
            include 'koneksi.php';
            $ambil=mysqli_query ($conn, "SELECT * FROM pengembalian WHERE id_pengembalian='$_GET[id_edit]'"); 
            $data=mysqli_fetch_array($ambil);
        ?>

        <div class="col-md-4">
            <div class="row">
                <form action="proses_transaksi.php?aksi=edit" method = "post">                          
                    <div class="mb-3"> 
                        <label class="form-label">ID Pengembalian</label>
                        <input type="text" class="form-control" name="id_pengembalian" value="<?= $data['id_pengembalian'] ?>" readonly>  
                    </div>
                    <div class="mb-3"> 
                        <label class="form-label">ID Transaksi</label>
                        <input type="text" class="form-control" name="id_transaksi" value="<?= $data['id_transaksi'] ?>" readonly>  
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Dikembalikan</label>
                        <select name="tgl_dikembalikan" class="form-select">
                        <?php
                            $pengembalian=mysqli_query($conn,"SELECT * FROM pengembalian");
                                while($data_pengembalian=mysqli_fetch_array($pengembalian)){
                                    $terpilih=($data_pengembalian['tgl_dikembalikan']==$data_pengembalian['tgl_dikembalikan']) ? 'selected' : '';
                                ?>
                                <option value="<?= $data_pengembalian['tgl_dikembalikan']?>"<?= $terpilih ?>> <?=$data_pengembalian['tgl_dikembalikan']?></option>
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
                