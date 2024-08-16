    <div class ="container">
        <h2>Form Edit Mahasiswa</h2>
        <?php
            include 'Koneksi.php';
            $ambil=mysqli_query ($db, "SELECT * FROM mahasiswa WHERE nim='$_GET[id_edit]'"); 
            $data=mysqli_fetch_array($ambil);
            $hobies=explode(",", $data['hobi']);
            $tgl_lahir=explode("-", $data['tgl_lahir']);
        ?>

        <div class="col-md-4">
            <div class="row">
                <form method = "post">
                    
                    <div class="mb-3"> 
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" value="<?= $data['nim'] ?>" readonly>  
                    </div>
                
                    <div class="mb-3"> 
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama_mhs'] ?>">  
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <select name="prodi" class="form-select">
                            <option value="<?= $data['prodi']?>" selected><?= $data['prodi']?></option>
                            <option value="">--pilih prodi--</option>
                            <option value="MI">Manajemen Informatika</option>
                            <option value="TK">Teknik Komputer</option>
                            <option value="TRPL">Teknologi Rekayasa Perangkat Lunak</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="<?= $data['email']?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <div class="row g-2">
                        <div class="col-md-3">
                        <select name="tgl" class="form-select">
                            <option value="">DD</option>
                        <?php
                            for ($i=1; $i<=31 ; $i++) { 
                                echo "<option value=$i>$i</option>";
                            }
                        ?>
                        </select>
                        </div>
                        <div class="col-md-3">
                        <select name="bln" class="form-select">
                            <option value="">MM</option>
                        <?php
                            $bulan=[1=> 'jan','feb','mar','apr','mei','jun','jul','agus','sept','okt','nov','des'];
                            foreach ($bulan as $key => $namaBulan) {
                                echo "<option value =".$key.">$namaBulan</option>"; 
                            }

                            // for ($i=1; $i<=12 ; $i++) { 
                            //     echo "<option value=$i>$i</option>";
                            // }
                        ?>
                        </select>
                        </div>
                        <div class="col-md-3">
                            <select name="thn" class="form-select">
                                <option value="">YYYY</option>
                            <?php
                                for ($i=2022; $i>=1975 ; $i--) { 
                                    echo "<option value=$i>$i</option>";
                                }
                            ?>
                            </select>
                            </div>
                        </div>    
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jekel" value="L" <?php if ($data['jekel']=='L') echo 'checked'?>> 
                            <label class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jekel" value="P" <?= ($data['jekel']=='P') ? 'checked' : ''?>>
                            <label class="form-check-label">Perempuan</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hoby</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="nyanyi" <?php if (in_array('nyanyi',$hobies)) echo 'checked'?>>
                            <label class="form-check-label">Bernyanyi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="nonton" <?php if (in_array('nonton',$hobies)) echo 'checked'?>>
                            <label class="form-check-label" for="flexCheckChecked">Menonton</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="baca" <?php if (in_array('baca',$hobies)) echo 'checked'?>>
                            <label class="form-check-label">Membaca</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3"><?= $data['alamat'] ?></textarea>
                    </div>

                    <div class="mb-3"> 
                        <label class="form-label"></label>
                        <input type="submit" class="btn btn-primary" name="submit" value="Update">
                        <a href="list_mhs.php"><input type="button" name="kembali" value="kembali" class="btn btn-warning"></a>
                    </div>
                </form>
                <?php
                    include 'Koneksi.php';
                    if (isset($_POST['submit'])) {
                        $nim = $_POST['nim'];
                        $nama_mhs = $_POST['nama'];
                        $tgl_lahir = $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
                        $jekel = $_POST['jekel'];
                        $hobies=implode(',',$_POST['hobi']);
                        $sql=mysqli_query($db,"UPDATE mahasiswa SET
                        nim         ='$_POST[nim]',
                        nama_mhs    ='$_POST[nama]',
                        tgl_lahir   ='$_POST[tgl_lahir]',
                        jekel       ='$_POST[jekel]',
                        hobi        ='$hobies',
                        alamat      ='$_POST[alamat]' WHERE nim='$_GET[id_edit]'");
                        if ($sql) {
                            echo "<script>window.location='index.php?p=mhs'</script>"; 
                           
                        }

                        switch ($_POST['bln']) {
                            case '1': $namaBulan = "Januari"; break;
                            case '2': $namaBulan = "Februari"; break;
                            case '3': $namaBulan = "Maret"; break;
                            case '4': $namaBulan = "April"; break;
                            case '5': $namaBulan = "May"; break;
                            case '6': $namaBulan = "Juni"; break;
                            case '7': $namaBulan = "Juli"; break;
                            case '8': $namaBulan = "Agustus"; break;
                            case '9': $namaBulan = "September"; break;
                            case '10': $namaBulan = "Oktober"; break;
                            case '11': $namaBulan = "November"; break;
                            case '12': $namaBulan = "Desember"; break;
                        }
                    }

                ?>

            </div>
        </div>
    </div>
<script src ="js/bootstrap,bundle.min.js"></script>