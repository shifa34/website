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
    <div class ="container">
        <h2>Form Edit Buku Tamu</h2>
        <?php
            include 'Koneksi.php';          //hubungkan ke db dulu
            $ambil=mysqli_query ($db, "SELECT * FROM tamu WHERE id='$_GET[id_edit]'");  //mysqli kita pakai saat baris aktif, dan kita pakai saat web yg kita buat dbms nya tidak berubah seperti migrasi. Klo pdo itu untuk ketika kemungkinan ada migrasi, karena jika terjadi perubahan kita kewalahan utk mengubah baris yg ada mysqli nya. klo pdo kita cmn ubah koneksinya. Penulisan mysqli ada dua macam penulisan.
            $data=mysqli_fetch_array($ambil); //fungsi fetch array adalah untuk memproses query dan data disimpan dalam bentuk array
            //untuk pemanggilan fetch array bisa menggunakan indeks arraynya atau menggunakan associate name nya
        ?>

        <div class="col-md-4">
            <div class="row">
                <form method = "post">
                    <div class="mb-3"> 
                        <label class="form-label">Nama</label>
                        <input type="text" name = "nama" value="<?= $data['nama']?>" class ="form-control">     <!--setelah kita ambil dibagian nama dari db kita panggil di value dgn php -->
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name = "email" value="<?= $data['email']?>"class ="form-control">
                    </div>

                    <div class="mb-3"> 
                        <label class="form-label">Komentar</label>
                        <textarea name = "komentar" class ="form-control" rows=3><?= $data['komentar']?></textarea>      <!--karena di textare tidak ada atribut value maka kita tambah sebelum penutup/-->
                    </div>

                    <div class="mb-3"> 
                        <label class="form-label"></label>
                        <input type="submit" name = "update" value="update" class ="btn btn-primary">
                    </div>
                </form>

                <?php
                    if (isset($_POST['update'])) {

                        $nama=$_POST['nama'];
                        $email=$_POST['email'];
                        $komentar=$_POST['komentar'];
                        $sql=mysqli_query($db,"UPDATE tamu SET nama='$nama', email='$email', komentar='$komentar' WHERE id='$_GET[id_edit]'");
                    
                        if ($sql){
                            header('location:list.php');       //redirect kembalikan halaman klo query gagal
                        }
                        
                        else {
                        echo "Proses update buku tamu, Gagal..";
                        }
                    }

                ?>

            </div>
        </div>
    </div>

    <script src ="js/bootstrap,bundle.min.js"></script>
</body>
</html>