<?php
session_start();
  if (!isset($_SESSION['user'])) {
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
    <link href="css/dashboard.css" rel="stylesheet">
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-center" href="#">SIAKAD</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="dropdown" style="padding-right: 15px;">
    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      <?= $_SESSION['user'] ?>
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
      <li><a class="dropdown-item" href="#">Profile</a></li>
      <li><a class="dropdown-item" href="#">Setting</a></li>
      <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
    </ul>
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
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=mhs">
              <span data-feather="users" class="align-text-bottom"></span>
              Mahasiswa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=prodi">
              <span data-feather="book-open" class="align-text-bottom"></span>
              Prodi
            </a>
          </li>
          <?php
            if ($_SESSION['level'] == 'admin') :
          ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=user">
              <span data-feather="user" class="align-text-bottom"></span>
              User
            </a>
          </li>
          <?php endif;?>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <?php
        include 'koneksi.php';
        $p=isset($_GET['p']) ? $_GET['p'] : 'home';

        if ($p=='home'){
      ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome To Siakad</h1> 
      </div>
      <?php
          include 'home.php';
        }

        if ($p=='user'){
      ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data User</h1> 
      </div>      
      <?php
          include 'user.php';
        }
  
        if ($p=='mhs'){
      ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Mahasiswa</h1> 
      </div>
      <?php
          include 'mahasiswa.php';
        }

        if($p=='prodi'){
      ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Prodi</h1> 
      </div>
      <?php
          include 'prodi.php';
        }
      ?>
    </main>
  </div>
</div>
<script src="js/bootstrap.bundle.min.js"> </script>
<script src="js/feather.min.js"> </script>
<script>
  feather.replace({ 'aria-hidden': 'true' })
</script>
</body>
</html>