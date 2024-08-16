<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="background">
        <div class="container">
            <h1>Upload File</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="file">Pilih file:</label>
                <input type="file" name="berkas" id="file" />
                <input type="submit" name="upload" value="Upload" />
            </form>
            <div class="result">
                <?php
                function panggil_model()
                {
                    $perintah = escapeshellcmd('python C:\\xampp\\htdocs\\tubes_did\\heart.py');
                    $output = shell_exec($perintah);
                    return $output;
                }

                if (isset($_POST["upload"])) {
                    // ambil data file
                    $namaFile = 'heart.csv';
                    $namaSementara = $_FILES['berkas']['tmp_name'];

                    // tentukan lokasi file akan dipindahkan
                    $dirUpload = "dataset/";

                    // Memastikan direktori ada
                    if (!is_dir($dirUpload)) {
                        mkdir($dirUpload, 0755, true);
                    }

                    // pindahkan file
                    $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

                    if ($terupload) {
                        echo "Upload berhasil!<br/>";
                        echo "Link dataset: <a href='" . $dirUpload . $namaFile . "'>" . $namaFile . "</a><br/>";
                        $hasil = panggil_model();
                        echo 'Hasil prediksi: <br/>' . nl2br($hasil);
                        echo "<br/>Link hasil: <a href='dataset/hasil.csv'>hasil.csv</a><br/>";
                    } else {
                        echo "Upload Gagal!";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>