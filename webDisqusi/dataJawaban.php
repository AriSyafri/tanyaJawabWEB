<?php
    session_start();

    $username = $_SESSION["username"];
    $job = $_SESSION["job"];
    
    // memanggil data fungsi
    require 'functions.php';    
    // menerima data get
    $idtanya = $_GET["idpertanyaan"];

    $data = query("SELECT * from pertanyaan where idpertanyaan = $idtanya")[0];

    $dataTanya = query("SELECT idjawaban,pertanyaan,jawaban.username as username, nama,jawaban FROM jawaban
                INNER JOIN pertanyaan ON jawaban.idpertanyaan = pertanyaan.idpertanyaan
                INNER JOIN USER ON jawaban.username = user.username
                WHERE pertanyaan.idpertanyaan = '$idtanya'");
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>diskusi</title>

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
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
            <a class="nav-link" href="listPertanyaan.php">Kembali</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- penutup navbar -->

    <div class="container">
        <h1 style="padding-top: 5rem;">Pertanyaan : <?= $data['pertanyaan']?></h1>

        <?php foreach ($dataTanya as $row) {?>
            <div class="ps-4 pb-3 pe-4">
                <div class="card">
                
                <div class="card-body">
                    <p class="card-title"><i class="bi bi-person"></i> <span>@<?=$row['username']?></span></p>
                    <hr>
                    <h5 class="card-text"><?= $row['jawaban']?></h5>

                    <!-- drop down -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($job != 'admin' AND $username != $row['username']) { ?>
                                <li><a class="dropdown-item disabled">Ubah</a></li>
                                <li><a class="dropdown-item disabled">Hapus</a></li>
                            <?php } else { ?>
                                <li><a class="dropdown-item" href="hapusJawaban.php?idjawaban=<?=$row['idjawaban'];?>" onclick="return confirm('yakin?');">Hapus</a></li>
                                <li><a class="dropdown-item" href="ubahJawaban.php?idjawaban=<?=$row['idjawaban'];?>">Ubah</a></li>
                            <?php }?>
                        </ul>
                        </div>
                    </div>
                
                    <!-- penutup drop down -->


                </div>
                </div>
            </div>

        <?php }?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  
</body>
</html>