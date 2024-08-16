<?php
include 'koneksi.php';
$mhs = mysqli_query($db, "SELECT * FROM prodi");
?>

<body>
    <div class="container">
        <div class="row ">

            <h2>Data Prodi</h2>
            <div class="col-md-4 mb-2">
                <a href="index.php?p=input_prd" class="btn btn-primary">Input Data Prodi</a>
            </div>
        </div>
        <table class="table table-bordered  table-hover table-responsive">
            <tr class="table-primary">
                <th>No</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1  ?>
            <?php foreach ($mhs as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td> <?= $row["nama_prodi"]; ?></td>
                <td> <?= $row["keterangan"]; ?></td>
                <td>
                    <a href="edit_prd.php?id_edt=<?= $row["id"]; ?>" class=" btn btn-warning">Edit</a>
                    <a href=" hapus_prd.php?p=edit_prd&id_hps=<?= $row["id"]; ?>"
                        onclick="return confirm('Yakin hapus data ?');" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php $i++  ?>
            <?php endforeach;  ?>
        </table>
    </div>