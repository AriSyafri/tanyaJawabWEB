<?php
  require 'functions.php';

  $data = query("select * from tbfile");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Gambar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">File</a>
          </li>
      </div>
    </div>
  </nav>


    <!-- penutup navbar -->
    <div class="container">
      <h1>Selamat Datang</h1>
      <div class="row">

      <?php foreach ($data as $row) { ?>
      <div class="col-md-4">
      <div class="card mb-3" style="width: 18rem;">
        <img src="img/<?= $row['gambar']?>" class="card-img-top" alt="tanpa gambar">
        <div class="card-body">
          <h5 class="card-title"><?= $row['nama']?></h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="img/<?= $row['gambar']?>">link</a>
          <a href="ubahData.php?idorang=<?= $row["idorang"]; ?>" class="btn btn-primary">Ubah Gambar</a>
        </div>
      </div>
      </div>
      <?php } ?>
    </div>
  </div>
  <a href="tambahData.php" class="btn btn-primary" role="button" aria-disabled="true">tambah data</a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
