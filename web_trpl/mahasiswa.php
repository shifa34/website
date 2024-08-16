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
<div class="container">
    <h2>Form Mahasiswa</h2>
    <div class="row">
        <div class="col-md-4">
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Umur</label>
                <input type="number" name="umur" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <select name="prodi" class="form-select">
                    <option value="">--pilih prodi--</option>
                    <option value="MI">Manajemen Informatika</option>
                    <option value="TK">Teknik Komputer</option>
                    <option value="TRPL">Teknologi Rekayasa Perangkat Lunak</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jekel" value="L" checked>  <!--checekd untuk nilai default biar terisi dulu -->
                    <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jekel" value="P">
                    <label class="form-check-label">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Hoby</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hoby[]" value="nyanyi">
                    <label class="form-check-label">Bernyanyi</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hoby[]" value="nonton">
                    <label class="form-check-label">Menonton</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hoby[]" value="baca">
                    <label class="form-check-label">Membaca</label>
                </div>
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
                <label class="form-label">Nilai</label>
                <input type="number" name="nilai" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label"></label>
                <input type="submit" name="submit" class="btn btn-primary">
            </div>

        </form>
            <?php
                if(isset($_POST['submit'])){
                    $NA=$_POST ['nilai'];
                    if($NA >= 80){
                        $NH = 'A';
                    }
                    else if($NA >= 70){
                        $NH = 'B';
                    }
                    else if($NA >= 50){
                        $NH = 'C';
                    }
                    else if($NA >= 30){
                        $NH = 'D';
                    }
                    else{
                        $NH = 'E';
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

                    // if(isset($_POST['hoby1'])){
                    //     $hoby = "membaca";
                    // }

                    // $hoby1=isset($_POST['hoby1']) ? $_POST['hoby1'] : ""; //tenary
                    // $hoby2=isset($_POST['hoby2']) ? $_POST['hoby2'] : "";
                    // $hoby3=isset($_POST['hoby3']) ? $_POST['hoby3'] : "";

                    //kita pakai array kita samakan name hoby
                    $hobies=implode(',',$_POST['hoby']);

                    print 'Nama anda =' .$_POST['nama']. '<br>';
                    echo "Umur anda = ".$_POST['umur']." Tahun <br>";
                    echo "Tanggal Lahir =".$_POST['tgl']."-".$namaBulan."-".$_POST['thn']."<br>";
                    echo "Program Studi = ".$_POST['prodi'].'<br>';
                    echo "Jenis Kelamin = ".$_POST['jekel'].'<br>';
                    echo "Hoby = ".$hobies.'<br>';
                    echo "Nilai anda = ".$NA."<br>";
                    echo "Nilai Huruf anda = ".$NH."<br>";
                    echo "Alamat = ".$_POST['alamat'].'<br>';
                
                }
            ?>
        </div>

    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>