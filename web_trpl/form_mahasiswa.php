<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Form Mahasiswa</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="number" name="umur"></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><select name="prodi">
                <option value="">-Pilih Prodi-</option>
                <option value="TRPL"> Teknologi Rekayasa Perangkat Lunak</option>   							
				<option value="MI"> Manajemen Informatika</option>
				<option value="TK"> Teknik Komputer</option>
                </td>
			</select>
            </tr>
            <tr>
                <td>Nilai</td>
                <td><input type="number" name="nilai"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="simpan"></td>
            </tr>
        </table>
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
            print 'Nama anda =' .$_POST['nama']. '<br>';
            echo "Umur anda = ".$_POST['umur']."Tahun <br>";
            echo "Program Studi = ".$_POST['prodi'].'<br>';
            echo "Nilai anda = ".$NA."<br>";
            echo "Nilai Huruf anda = ".$NH."<br>";
           
        }
    ?>
    
</body>
</html>