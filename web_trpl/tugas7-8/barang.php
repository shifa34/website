<body>
<h2> Tambah Data Barang </h2>
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
            <form action="proses_brg.php?aksi=create" method="post">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama Merek</th>
                    <th>Warna</th>
                    <th>Jumlah</th>
                </tr>
                <?php
                    include 'koneksi.php';
                    $ambil = mysqli_query($db,"SELECT * FROM printer");
                    $no = 1;
                    while($data = mysqli_fetch_array($ambil)){
                ?>
                    <tr>
                        <td> <?php echo $no?> </td>
                        <td> <?php echo $data['nama_merek'] ?> </td>
                        <td> <?php echo $data['warna'] ?> </td>
                        <td> <?php echo $data['jumlah'] ?> </td>
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
    <div class="row">
        <div class="col-md-4">
            <form action="proses_brg.php?aksi=create" method="post">
                <div class="mb-3">
                    <label class="form-label"> Nama Merek </label>
                    <input type="text"name="nama_merek" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label"> Warna </label>
                    <input type="text"name="warna" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label"> Jumlah </label>
                    <input type="text"name="jumlah" class="form-control">
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
