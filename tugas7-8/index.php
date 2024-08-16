<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link rel="stylesheet" href="style.css"> <!-- Include your CSS file for styling -->
</head>
<body>

    <div class="container">
        <h2>Data Barang</h2>

        <?php
        // Database connection
        $db = mysqli_connect('localhost', 'root', '', 'db_barang');

        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve data from the database
        $result = mysqli_query($db, "SELECT * FROM printer");

        if (mysqli_num_rows($result) > 0) {
        ?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Merek</th>
                    <th>Warna</th>
                    <th>Jumlah</th>
                </tr>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['nama_merek']; ?></td>
                        <td><?php echo $row['warna']; ?></td>
                        <td><?php echo $row['jumlah']; ?></td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </table>
            <p><a href="input.php">Tambah Data</a></p>
        <?php
        } else {
            echo "No records found";
        }

        // Close the database connection
        mysqli_close($db);
        ?>

    </div>

</body>
</html>
