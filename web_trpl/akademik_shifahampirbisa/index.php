<?php
session_start();
if(!isset($_SESSION['user'])){
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siakad</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?p=home">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=mhs">
              <span data-feather="users" class="align-text-bottom"></span>
              Mahasiswa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=prd">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Prodi
            </a>
          </li>
          <?php
            if($_SESSION['level']=='admin'){
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=user">
                <span data-feather="users" class="align-text-bottom"></span>
                  Users
              </a>
            </li>
          <?php
            }
          ?>
          
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2" class="align-text-bottom"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers" class="align-text-bottom"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>
<!-- disini mulai mainnya/-->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <?php
                    include ('Koneksi.php');
                    $p=isset($_GET['p']) ? $_GET['p'] : 'home';   //buat deafult nya klo ga ada nilai p nya maka home yg muncul pake tenary bisa pake if else
                    if($p=='home') include 'home.php';
                    if($p=='mhs') include 'mahasiswa.php';      //lgsg ke mahasiswa.php mempermudah dibanding membuat satu satu kek dibawah

                    if ($p == 'prd') include 'prodi.php';
                    // if ($p == 'input_prd') include 'input_prd.php';
                    // if ($p == 'edit_prd') include 'edit_prd.php';

                    if($p == 'user') include 'user.php';


                    // if($p=='input_mhs') include 'mahasiswa.php';
                    // if($p=='edit_mhs')include 'edit_mhs.php';
                    // if($p=='hapus_mhs') include 'hapus_mhs.php';
        ?>
    </main>
  </div>
</div>    

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/feather.min.js"></script>
    <script>
        feather.replace({ 'aria-hidden': 'true' })
    </script>
</body>
</html>