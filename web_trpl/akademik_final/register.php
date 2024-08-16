
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Login</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form method="post" acttion="">
    <h1 class="h3 mb-3 fw-normal">Sign Up</h1>

    <?php
    $pesan = isset($_GET['msg']) ? $_GET['msg'] : '';

    if($pesan == 'exist'){ ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Username Telah Ada</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($pesan == 'error') { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Errorr</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } elseif ($pesan == 'succes') { ?>     
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="form-floating">
      <input type="text" class="form-control" name="username" id="floatingInput" placeholder="username">
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating mt-2">
      <input type="password" class="form-control"  name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-floating">             
      <select class="form-select" aria-label="Default select example" name="level" id="floatingLevel">
          <!-- <option value=""selected>Level</option> -->
          <option value="admin">Admin</option>
          <option value="user">User</option>
      </select>
      <label for="floatingLevel">Level</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary mt-2" type="submit" name="submit" >Sign Up</button>
    <div class="sign-up text-end mt-1">
      <a style="text-decoration: none" href="login.php">Sign In</a>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; <?=date('Y')?></p>
  </form>
</main>

<?php
    if (isset($_POST['submit'])) {
        include ('koneksi.php');

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $level = $_POST['level'];

        $select = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");

        if(mysqli_num_rows($select)) {
          header("Location: register.php?msg=exist");
        } else {
          $sql = mysqli_query($db, "INSERT INTO user(username, password, level)
                VALUES('$username','$password','$level')");

          if ($sql) {
            header("Location: register.php?msg=succes");
          } else {
            header("Location: register.php?msg=error");
          }
        }              
    }
?>
  <script src="js/bootstrap.bundle.min.js"> </script>
  </body>
</html>
