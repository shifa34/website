<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class = "container">
        <div class="row">
        <h2>List data buku tamu</h2>
        <table class="table table-bordered">
            <tr >
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Komentar</th>
                <th>Aksi</th>

            </tr>
       
       <?php
            include("koneksi.php");
            $tampil=mysqli_query($db,"SELECT * FROM tamu");
            $no=1;
            while ($data=mysqli_fetch_array($tampil)) {
        ?>
            <tr>
                <td> <?php echo $no; ?> </td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['komentar']; ?></td>
                <td>
                    <a href="hapus.php?id_hapus=<?= $data['id']?>" class = "btn btn-danger"
                    onclick="return confirm ('Anda yakin akan mengahapus ini?')">Hapus</a> 
                    <!-- ?= : php echo-->
                    <a href="edit.php?id_edit=<?=$data['id']?>" class = "btn btn-warning">Edit</a>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>
        </table>

        <!-- <p>
            Klik <a href=gbook.php>di sini</a> untuk Proses input buku tamu
        </p> -->
        </div>

    </div>
</body>
</html>