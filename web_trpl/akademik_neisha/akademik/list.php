<div class="row mb-3">
    <div class="col-md-3">
        <a href="index.php?p=entri_tamu" class="btn btn-primary">Input Data Buku Tamu</a>
    </div>
</div>
<div class="row">
    <table class="table table-bordered">
        <tr class="table-danger text-center">
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Komentar</th>
            <th>Aksi</th>
        </tr>
        <?php
            include 'koneksi.php';
            $tampil = mysqli_query($db,"SELECT * FROM Tamu");
            $no = 1;
            while($data = mysqli_fetch_array($tampil)){
        ?>
            <tr class="text-center">
                <td> <?php echo $no ?> </td>
                <td> <?php echo $data['nama'] ?> </td>
                <td> <?php echo $data['email'] ?> </td>
                <td> <?php echo $data['komentar'] ?> </td>
                <td> 
                    <a href="hapus.php?id_hapus=<?= $data['id']?> " class="btn btn-danger" onclick="return confirm ('Yakin akan menghapus data ?')">Hapus</a>
                    <a href="index.php?p=edit_tamu&id_edit=<?php echo $data['id']?> " class="btn btn-warning">Edit</a>
                </td>
            </tr>
        <?php
                $no++;
            }
        ?>
    </table>
</div>

