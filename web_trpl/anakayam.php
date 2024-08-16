<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Anak Ayam</label>
        <div class="col-sm-10">
            <input type="number" class="anak">
        </div>
        <div class="mb-3">
                <label class="form-label"></label>
                <input type="submit" name="submit" class="btn btn-primary">
            </div>
    </div>
    <form>
        <?php
            if(isset($_POST['submit'])){
                $n = $_POST['anakayam'];
                for ($i = $n; $i > 0; $i--){
                    $ank = ($i == 1) ? 'induknya' : ($i-1);
                    echo 'Anak Ayam turun '.$i.' Mati 1 tinggal : '.$ank.'<br>';
                }
            }
        ?>
    </form>


    <!-- <div class="container">
        <div class="col-md-4">
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Anak Ayam</label>
                <input type="number" name="ayam" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label"></label>
                <input type="submit" name="submit" class="btn btn-primary">
            </div>
        </div>
    </div> -->


</body>

</html>





<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="continer">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <div class="col-sm-2 col-form-label">Anak Ayam</div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="anakayam">
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2 col-form-label">
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <?php
                    if(isset($_POST['submit'])){
                        $n = $_POST['anakayam'];
                        for ($i = $n; $i > 0; $i--){
                            $ank = ($i == 1) ? 'induknya' : ($i-1);
                            echo 'Anak Ayam turun '.$i.' Mati 1 tinggal : '.$ank.'<br>';
                        }
                    }
                ?>

            </div>
        </div>
    </div>
</body>

</html> -->