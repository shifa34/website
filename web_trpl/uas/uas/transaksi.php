<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Transaksi</h1>
      </div>
   
<?php
    $page=isset($_GET['page']) ? $_GET['page'] : 'list';      //buat keadaaan default untuk list
    switch ($page){
        case 'list':
?>
    <div class = "container">
        <div class="row">
           
        </div>
        <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Buku </th>
                        <th>Anggota</th>
                        <th>Tanggal Pinjam </th> 
                        <th>Tanggal Kembali </th> 
                        <th>Status </th>
                        <th>Aksi</th>
                    </tr>
                </thead>     

            <?php
                    include "koneksi.php";
                    $transaksi=mysqli_query($conn,"SELECT * FROM transaksi INNER JOIN 
                                buku ON transaksi.id_buku = buku.id_buku INNER JOIN 
                                anggota ON transaksi.nim_anggota = anggota.nim"); 
                    
                    if (!$transaksi) {
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    }else{
                    $no=1;
                    while ($data=mysqli_fetch_array($transaksi)) {
            ?>
                    <tr>
                        <td><?php echo $no; ?> </td>
                        <td><?php echo $data['id_transaksi']; ?></td>
                        <td><?php echo $data['judul_buku']; ?></td>
                        <td><?php echo $data['nama_anggota']; ?></td>
                        <td><?php echo $data['tgl_pinjam']; ?></td>
                        <td><?php echo $data['tgl_kembali']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                        <td>
                    <a href="index.php?p=transaksi&page=edit&id_edit=<?=$data["id_transaksi"]; ?>" class="btn btn-warning">Edit</a>
                    <a href="proses_transaksi.php?aksi=delete&id_hapus=<?= $data["id_transaksi"]; ?>"
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
    case 'edit' :
?>
    <div class ="container">
        <h2>Edit Transaksi</h2>
        <?php
            include 'koneksi.php';
            $ambil=mysqli_query ($conn, "SELECT * FROM transaksi WHERE id_transaksi='$_GET[id_edit]'"); 
            $data=mysqli_fetch_array($ambil);
        ?>

        <div class="col-md-4">
            <div class="row">
                <form action="proses_transaksi.php?aksi=edit" method = "post">                          
                    <div class="mb-3"> 
                        <label class="form-label">ID Transaksi</label>
                        <input type="text" class="form-control" name="id_transaksi" value="<?= $data['id_transaksi'] ?>" readonly>  
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Buku</label>
                        <select name="buku" class="form-select">
                        <?php
                            $buku=mysqli_query($conn,"SELECT * FROM buku");
                                while($data_buku=mysqli_fetch_array($buku)){
                                    $terpilih=($data['id_buku']==$data_buku['id_buku']) ? 'selected' : '';
                                ?>
                                <option value="<?= $data_buku['id_buku']?>"<?= $terpilih ?>> <?=$data_buku['judul_buku']?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Anggota</label>
                        <select name="anggota" class="form-select">
                        <?php
                            $anggota=mysqli_query($conn,"SELECT * FROM anggota");
                                while($data_anggota=mysqli_fetch_array($anggota)){
                                    $terpilih=($data['nim']==$data_anggota['nim_anggota']) ? 'selected' : '';
                                ?>
                                <option value="<?= $data_anggota['nim']?>"<?= $terpilih ?>> <?=$data_anggota['nama_anggota']?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="selesai" <?php if ($data['status']=='selesai') echo 'checked'?>> 
                            <label class="form-check-label">Selesai</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="belum selesai" <?= ($data['status']=='belum selesai') ? 'checked' : ''?>>
                            <label class="form-check-label">Belum Selesai</label>
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
                