<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Peminjaman</h1>
      </div>
   
<?php
    $page=isset($_GET['page']) ? $_GET['page'] : 'list';      //buat keadaaan default untuk list
    switch ($page){
        case 'list':
?>
    <div class = "container">
        <div class="row">
            <div class="col-md-4">
                <a href="index.php?p=peminjaman&page=input" class="btn btn-primary mb-3"> Buat Peminjaman</a>
            </div>
        </div>
        <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th>No</th>
                        <th>ID Peminjaman</th>
                        <th>Anggota</th>
                        <th>Buku </th>
                        <th>Tanggal Pinjam </th> 
                        <th>Tanggal Kembali </th> 
                        <th>Status </th>
                        <?php
                            if ($_SESSION['level']=='admin'){
                        ?>
                        <th>Aksi</th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>     

            <?php
                    include "koneksi.php";
                    $peminjaman=mysqli_query($conn,"SELECT * FROM peminjaman"); 
                    
                    if (!$peminjaman) {
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    }else{
                    $no=1;
                    while ($data=mysqli_fetch_array($peminjaman)) {
            ?>
                    <tr>
                        <td><?php echo $no; ?> </td>
                        <td><?php echo $data['id_peminjaman']; ?></td>
                        <td><?php echo $data['id_anggota']; ?></td>
                        <td><?php echo $data['id_buku']; ?></td>
                        <td><?php echo $data['tgl_pinjam']; ?></td>
                        <td><?php echo $data['tgl_kembali']; ?></td>
                        <td><?php echo $data['status_peminjaman']; ?></td>
                        <?php
                            if ($_SESSION['level']=='admin'){
                        ?>
                        <td>
                    <a href="index.php?p=peminjaman&page=edit&id_edit=<?=$data["id_peminjaman"]; ?>" class="btn btn-warning">Edit</a>
                    <a href="proses_peminjaman.php?aksi=delete&id_hapus=<?= $data["id_peminjaman"]; ?>"
                        onclick="return confirm('Yakin hapus data ?');" class="btn btn-danger"><span data-feather="trash-2" class="align-text-bottom"></span> Hapus</a>
                    </td>
                    <?php
                            }
                    ?>
                        
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
        <form action="proses_peminjaman.php?aksi=create" method="post"> 


                <div class="mb-3">
                    <label class="form-label"> ID Peminjaman </label>
                    <input type="int"name="id_peminjaman" class="form-control" >
                </div>

                <div class="mb-3">
                    <label class="form-label"> Anggota </label>
                    <input type="text"name="anggota" class="form-control" value="<?php echo ($_SESSION['user'])?> "readonly>
                </div>

                <input type="hidden"name="id_login" class="form-control" value="<?php echo ($_SESSION['id_login'])?> "readonly>

                <div class="mb-3">
                <label class="form-label">Buku</label>
                <select name="buku" class="form-select">
                    <option value="">--pilih buku--</option>
                    <?php
                        $buku=mysqli_query($conn, "select * from buku");
                        while($data_buku=mysqli_fetch_array($buku)){
                    ?> 
                    <option value="<?= $data_buku['id_buku']?>"><?=$data_buku['judul_buku']?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="small mb-1" for="pengarang_buku">Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control">
            </div>

            <div class="mb-3">
                <label class="small mb-1" for="pengarang_buku">Tanggal Kembali</label>
                <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
            </div>
           
            <div class="mb-3">
                <label class="form-label">Status Peminjaman</label>
                <select name="status" class="form-select">
                <option value="belum selesai">Belum Selesai</option>
        </select>
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
            $ambil=mysqli_query ($conn, "SELECT * FROM peminjaman WHERE id_peminjaman='$_GET[id_edit]'"); 
            $data=mysqli_fetch_array($ambil);
        ?>

        <div class="col-md-4">
            <div class="row">
                <form action="proses_peminjaman.php?aksi=edit" method = "post">                          
                    <div class="mb-3"> 
                        <label class="form-label">ID Peminjaman</label>
                        <input type="text" class="form-control" name="id_peminjaman" value="<?= $data['id_peminjaman'] ?>" readonly>  
                    </div>

                    <div class="mb-3"> 
                        <label class="form-label">ID Anggota</label>
                        <input type="text" class="form-control" name="anggota" value="<?= $data['id_anggota'] ?>" readonly>  
                    </div>

                    <div class="mb-3"> 
                        <label class="form-label">ID Buku</label>
                        <input type="text" class="form-control" name="buku" value="<?= $data['id_buku'] ?>" readonly>  
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="selesai" <?php if ($data['status_peminjaman']=='selesai') echo 'checked'?>> 
                            <label class="form-check-label">Selesai</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="belum selesai" <?= ($data['status_peminjaman']=='belum selesai') ? 'checked' : ''?>>
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

<script src ="js/bootstrap.bundle.min.js"></script>

</body>
                
</html>
                