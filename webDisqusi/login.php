<?php 

  session_start();
  if(isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
  }

  require 'functions.php';

  if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $passw = $_POST["pass"];


    $result = mysqli_query($conn, "SELECT * FROM user WHERE
        username = '$username'");

    if(mysqli_num_rows($result) === 1) {

      $row = mysqli_fetch_assoc($result);

      // membuat session
      $_SESSION["job"]=$row["job"];
      $_SESSION["nama"]=$row["nama"];
      $_SESSION["username"]=$row["username"]; 

      if (password_verify($passw, $row["pass"])) {
        $_SESSION["login"] = true;

        header("location: index.php");
        exit;
      }
    }
    $error = true;
  }
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

    <form action="" method="post">
    <!-- validasi -->
    <?php if ( isset($error)) : ?>
      <script>
        alert("Periksa username dan password");
      </script>
    <?php endif;?>
    <!-- penutup validasi -->

    <section class="vh-100" style="background-color: #508bfc;">
      <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">
                  <h2 class="mb-3">Selamat Datang di Website Disqusi</h2>
                  <div class="form-outline mb-3">
                  <input type="text" id="username" name="username" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX-2">Username</label>
                  </div>

                  <div class="form-outline mb-3">
                  <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX-2">Password</label>
                  </div>

                  <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>
                  <a href="signIn.php" class="btn btn-success btn-lg btn-block">Daftar</a>
                </div>
              </div>
          </div>
          </div>
      </div>
    </section>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
