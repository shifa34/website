<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Operator Aritmatika</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td>Bilangan 1</td>
                <td><input type="number" name="bil1"></td>
            </tr>
            <tr>
                <td>Bilangan 2</td>
                <td><input type="number" name="bil2"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="kali" value="*"></td>
                <td><input type="submit" name="bagi" value="/"></td>
                <td><input type="submit" name="tambah" value="+"></td>
                <td><input type="submit" name="kurang" value="-"></td>
                <td><input type="submit" name="modulus" value="%"></td>
            </tr>
        </table>
    </form>
    <?php
        $bil1=isset($_POST ['bil1']) ? $_POST ['bil1'] : '';
        $bil2=isset($_POST ['bil2']) ? $_POST ['bil2'] : '';
        if(isset($_POST['kali'])){
            $kali=$bil1*$bil2;
            echo "Hasil Perkalian ".$bil1." * ".$bil2." = ".$kali;
        }

    ?>
</body>
</html>