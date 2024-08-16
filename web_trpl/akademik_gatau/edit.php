<?php
    include 'koneksi.php';
    $ambil = mysqli_query($db, "SELECT * FROM Tamu WHERE id='$_GET[id_edit]' ");
    $data = mysqli_fetch_array($ambil);
?>
<div class="row">
    <div class="col-md-8">
        <form action="" method="post">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" value="<?= $data['nama']?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" value="<?= $data['email']?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Komentar</label>
                <div class="col-sm-9">
                    <textarea name="komentar" class="form-control" rows="4"><?= $data['komentar']?> </textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-8">
                    <input type="submit" name="update" value="Update" class="btn btn-success">
                    <input type="reset" name="reset" value="Reset" class="btn btn-warning">
					<a href="index.php?p=tamu">
						<input type="button" name="kembali" value="Kembali" class="btn btn-primary">
					</a>
                </div>
            </div>
        </form>
        <?php
            if(isset ($_POST ['update'])){
                $sql = mysqli_query ($db, "UPDATE Tamu SET 
                nama     = '$_POST[nama]',
                email    = '$_POST[email]',
                komentar = '$_POST[komentar]'
                WHERE id = '$_GET[id_edit]' ");
                if($sql){
                    // header('location:list.php');    //redirect
                    echo "<script>window.location='index.php?p=tamu'</script>"; //redirect js
                }
                else {
                    print('Gagal mengupdate data bukutamu');
                }
            }
        ?>
    </div>
</div>
