<?php
    require 'functions.php';

    $data = query("SELECT pertanyaan,jawaban.username as username, nama,jawaban FROM jawaban
    INNER JOIN pertanyaan ON jawaban.idpertanyaan = pertanyaan.idpertanyaan
    INNER JOIN USER ON jawaban.username = user.username");


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>diskusi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

    <!-- bagian navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Tanya</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="listPertanyaan.php">Pertanyaan</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Jawaban</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Keluar</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- penutup navbar -->

    
    <div class="container">
        <h1 style="padding-top: 5rem;">Selamat datang di Halaman List Terjawab</h1>
        
        <?php foreach ($data as $row) {?>

        <div class="ps-4 pb-3 pe-4">
            <div class="card">
            
            <div class="card-body">
                <h5 class="card-title"><b>Pertanyaaan : <?=$row['pertanyaan']?></b></h5>
                <p class="card-text">Username : <?= $row['username']?></p>
                <p class="card-text">Jawaban : <?= $row['jawaban']?></p>

                <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="jawab.php?idpertanyaan=<?=$row['idpertanyaan'];?>" class="btn btn-primary me-md-2">Jawab</a>
                </div> -->
            </div>
            </div>
        </div>

        <?php }?>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  
</body>
</html>