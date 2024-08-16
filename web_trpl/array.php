<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $minuman=['kopi','teh es','jus'];

        //untuk menampilkan semua kita pakai perulangan for each
        foreach ($minuman as $value) {              //value itu nilai untuk array
            echo $value."<br>";
        }

        // for ($i=0; $i < count($minuman) ; $i++) { 
        //     echo $minuman[$i].'<br>';
        // }

        // echo $minuman[1];        hanya menampilkan satu nilai
    ?>
</body>
</html>