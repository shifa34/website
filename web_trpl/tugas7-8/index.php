<?php
// Tambahkan kode berikut di atas tag <!DOCTYPE html>
if (!isset($_GET['p'])) {
    header("Location: index.php?p=brg");
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

</head>
<body>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?p=brg">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=brg&page=input">
              <span data-feather="users" class="align-text-bottom"></span>
              Tambah Data
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
          if ($p=='brg') include'barang.php';
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