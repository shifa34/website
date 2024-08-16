<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siakad</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Siakad</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Mahasiswa</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <!-- menu -->
                <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?p=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=mhs">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Prodi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
                </ul>
            </div>

            <div class="col-md-10">
                <!-- content -->
                <?php
                    $p=isset($_GET['p']) ? $_GET['p'] : 'home';   //buat deafult nya klo ga ada nilai p nya maka home yg muncul pake tenary bisa pake if else
                    if($p=='home') include 'home.php';
                    if($p=='mhs') include 'mahasiswa.php';      //lgsg ke mahasiswa.php mempermudah dibanding membuat satu satu kek dibawah

                    // if($p=='input_mhs') include 'mahasiswa.php';
                    // if($p=='edit_mhs')include 'edit_mhs.php';
                    // if($p=='hapus_mhs') include 'hapus_mhs.php';
                ?>
            </div>
         </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>