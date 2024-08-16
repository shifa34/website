<div class = "container">
        <div class="row">
            <h2>List data Mahasiswa</h2>
            <div class="col-md-4">
                <a href="index.php?p=input_mhs" class="btn btn-primary"> Input data Mahasiswa</a>
            </div>
        </div>

        <table class="table table-bordered">
            <tr >
                <th>No</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Email</th>
                <th>Jekel</th>
                <th>Aksi</th>
            </tr>
       
            <?php
                    include("Koneksi.php");
                    $tampil=mysqli_query($db,"SELECT * FROM mahasiswa");
                    $no=1;
                    while ($data=mysqli_fetch_array($tampil)) {
            ?>
                    <tr>
                        <td> <?php echo $no; ?> </td>
                        <td><?php echo $data['nim']; ?></td>
                        <td><?php echo $data['nama_mhs']; ?></td>
                        <td><?php echo $data['prodi']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['jekel']; ?></td>
                        <td>
                            <a href="hapus_mhs.php?p=id_hapus=<?= $data['nim']?>" class = "btn btn-danger"
                            onclick="return confirm ('Anda yakin akan mengahapus ini?')">Hapus</a> 
                            <!-- ?= : php echo-->
    
                            <a href="index.php?p=edit_mhs&id_edit=<?=$data['nim']?>" class = "btn btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                 ?>
        </table>
    </div>