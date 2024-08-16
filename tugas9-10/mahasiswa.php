
<body>
<h2> Data Mahasiswa </h2>
<?php
$page=isset($_GET['page']) ? $_GET['page'] : 'list';
switch ($page){
    case 'list' :
?>

<div class="container">
        <div class="row mb-2">
        <?php
            $pesan=isset($_GET['msg']) ? $_GET['msg'] : '';
            if ($pesan =='ok'){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil disimpan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            }
        ?>
            <form action="proses_mhs.php?aksi=create" method="post">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Aksi</th>

                </tr>
                <?php
                    include 'koneksi.php';
                    $ambil = mysqli_query($db,"SELECT * FROM siswa");
                    $no = 1;
                    while($data = mysqli_fetch_array($ambil)){
                ?>
                    <tr>
                        <td> <?php echo $no ?> </td>
                        <td> <?php echo $data['nama'] ?> </td>
                        <td> <?php echo $data['alamat'] ?> </td>
                        <td> <?php echo $data['jekel'] ?> </td>
                        <td> <?php echo $data['agama'] ?> </td>
                        <td> <?php echo $data['sekolah'] ?> </td>

                        <td> 
                            <a href="proses_mhs.php?aksi=delete&id_hapus=<?= $data['nama']?> " class="btn btn-danger" 
                            onclick="return confirm ('Yakin akan menghapus data ?')"><span data-feather="trash-2" class="align-text-bottom"></span> Hapus</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                    }
                ?>
            </table>
        </div>
    </div>

<?php        
        break;
    case 'input' : 
?>

<div class="container">
    <h2>Form Input Siswa</h2>
    <div class="row">
        <div class="col-md-4">
            <form action="proses_mhs.php?aksi=create" method="post">
                <div class="mb-3">
                    <label class="form-label"> Nama </label>
                    <input type="text"name="nama" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label"> Alamat </label>
                    <textarea name="alamat" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label"> Jenis Kelamin </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jekel" value="L" checked>
                        <label class="form-check-label"> Laki-Laki </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jekel" value="P">
                        <label class="form-check-label"> Perempuan </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label"> Agama </label>
                    <select name="agama">
                        <option value="">-Agama-</option>
                        <option value="Islam">Islam</option>   							
    			        <option value="Kristen">Kristen</option>
	    		        <option value="Hindu">Hindu</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label"> Sekolah Asal </label>
                    <input type="text"name="sekolah" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label"></label>
                    <input type="submit"name="input" class="btn btn-primary">
                    <input type="reset"name="reset" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    break;
}
?> 
</body>
