<?php
// Tambahkan kode berikut di atas tag <!DOCTYPE html>
if (!isset($_GET['p'])) {
    header("Location: index.php?p=mhs");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Siakad</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">SIAKAD</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?p=mhs">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=mhs&page=input">
              <span data-feather="users" class="align-text-bottom"></span>
              Formulir Siswa
            </a>
          </li>

          
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      
      </div>

      <?php
          include 'koneksi.php';
          $p=isset($_GET['p']) ?$_GET['p'] : 'home';
          if($p=='home') include'home.php';
          if ($p=='mhs') include'mahasiswa.php';
          
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