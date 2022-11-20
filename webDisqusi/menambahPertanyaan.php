<?php

    session_start();

    require 'functions.php';

    if (isset($_POST["submit"])) {
        if (menambahPertanyaan($_POST) > 0) {
            echo "
                <script> 
                    alert('data berhasil ditambahkan');
                    document.location.href = 'listPertanyaan.php'; 
                </script>
            ";
        } else {
            echo "
                <script> 
                        alert('data gagal ditambahkan');
                        document.location.href = 'listPertanyaan.php'; 
                </script>
            ";
        }
    }

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
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
        <form action="" method="post">
            <h1 style="padding-top: 5rem;">Silahkan Bertanya</h1>

            <input type="hidden" name="usertanya" id="usertanya" value="<?= $_SESSION["username"]?>">
            
            <div class="mb-3">
                <label for="tanya" class="form-label">Masukan Pertanyaan</label>
                <textarea class="form-control" id="tanya" name="tanya" rows="3"></textarea>
            </div>
    
            <div class="class= row d-flex justify-content-center align-content-center">
                <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  
</body>
</html>