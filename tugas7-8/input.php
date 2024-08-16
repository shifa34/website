<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Input Data Barang</h2>
    <form action="proses_brg.php?aksi=create" method="post">
        <div class="mb-3">
            <label for="nama_merek" class="form-label">Nama Merek</label>
            <input type="text" name="nama_merek" class="form-control">
        </div>
        <div class="mb-3">
            <label for="warna" class="form-label">Warna</label>
            <input type="text" name="warna" class="form-control">
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="text" name="jumlah" class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" name="input" class="btn btn-primary">
            <input type="reset" name="reset" class="btn btn-warning">
        </div>
    </form>
</div>
</body>
</html>
