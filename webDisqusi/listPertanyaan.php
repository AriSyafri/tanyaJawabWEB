<?php
    session_start();
    require 'functions.php';

    $data = query("SELECT * from pertanyaan");

    $username = $_SESSION["username"];
    $job = $_SESSION["job"];
    

    // tombol cari ditekan
    if (isset($_POST["cari"])) {
        $data = cariTanya($_POST["keyword"]);
    }
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
            <a class="nav-link active" aria-current="page" href="#">Pertanyaan</a>
            </li>
            <li class="nav-item">
                <?php if ($job != 'admin') { ?>
                    <a class="nav-link disabled" href="adminData.php">Admin</a>
                <?php } else { ?>
                    <a class="nav-link" href="adminData.php">Admin</a>
                <?php }?>
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
        <h1 style="padding-top: 5rem;">Selamat datang di Halaman Pertanyaan</h1>

        <!-- bagian pencarian -->
        <form action="" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="Masukan pertanyaan atau username yang akan dicari" aria-label="masukan pertanyaan" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" name="cari">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                </button>
            </div>
        </form>
        <!-- penutup pencarian -->
        
        <a style="margin-bottom: 1rem;" class="btn btn-secondary" href="menambahPertanyaan.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 20">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
        </svg>
            Buat Pertanyaan
        </a>

        <?php foreach ($data as $row) {?>

        <?php 

            // mencari id pertanyaan
            $dataJawab = $row['idpertanyaan'];

            // menghitung idpertanyaan
            $jumlah = query("SELECT COUNT(pertanyaan) AS angka FROM jawaban
                        INNER JOIN pertanyaan ON jawaban.`idpertanyaan` = pertanyaan.`idpertanyaan`
                        INNER JOIN USER ON jawaban.`username` = user.`username`
                        WHERE pertanyaan.`idpertanyaan` = $dataJawab");

        ?>

        <?php foreach ($jumlah as $row2) { ?>
            <div class="ps-4 pb-3 pe-4">
                <div class="card">
                <div class="card-body">
                    <p class="card-title">
                    <i class="bi bi-person"></i>
                        <span class="fs-8">@<?= $row['username']?></span>
                    </p>
                    <h3 class="card-text"><b><?= $row['pertanyaan']?></b></h3>

                    <!-- drop down  dan button-->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        
                        <a href="dataJawaban.php?idpertanyaan=<?=$row['idpertanyaan'];?>" class="btn btn-success me-md-2"><i class="bi bi-journal-text"></i> <?= $row2["angka"]; ?></a>
                        <a href="menambahJawaban.php?idpertanyaan=<?=$row['idpertanyaan'];?>" class="btn btn-primary me-md-2"><i class="bi bi-pencil"></i></a>
                        
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($job != 'admin' AND $username != $row['username']) { ?>
                                <li><a class="dropdown-item disabled" href="hapusPertanyaan.php?idpertanyaan=<?=$row['idpertanyaan'];?>" onclick="return confirm('yakin?');">Hapus</a></li>
                                <li><a class="dropdown-item disabled" href="ubahTanya.php?idpertanyaan=<?=$row['idpertanyaan'];?>">Ubah</a></li>
                            <?php } else { ?>
                                <li><a class="dropdown-item" href="hapusPertanyaan.php?idpertanyaan=<?=$row['idpertanyaan'];?>" onclick="return confirm('yakin?');">Hapus</a></li>
                                <li><a class="dropdown-item" href="ubahTanya.php?idpertanyaan=<?=$row['idpertanyaan'];?>">Ubah</a></li>
                            <?php }?>
                        </ul>
                        </div>
                    </div>

                    <!-- penutup drop down -->
                </div>
                </div>
            </div>

        <?php }?>

        <?php }?>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  
</body>
</html>