<?php
    require 'functions.php';
    
    $idJawab = $_GET["idjawaban"];

    $data = query("SELECT * FROM jawaban where idjawaban = $idJawab")[0];

    if (isset ($_POST["submit"])) {
        if (ubahJawab($_POST) > 0) {
            echo "
                <script>
                    alert('Jawaban telah diubah');
                    document.location.href = 'listPertanyaan.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Jawaban gagal diubah');
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
        <title>mengubah jawaban</title>
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
    </div>
    </nav>

    <!-- penutup navbar  -->

    <div class="container">

        <h1 style="padding-top: 5rem;">Selamat datang di Halaman Ubah Jawaban</h1>
        <form class="" method="post">

            <input type="hidden" name="idjawaban" id="idjawan" value="<?= $data["idjawaban"]?>">
            

            <div class="mb-3">
                <label for="jawab" class="form-label">Masukan Jawaban : </label>
                <textarea style="height : 250px;"  class="form-control" id="jawaban" name="jawaban" rows="3"><?= $data["jawaban"]?></textarea>
            </div>


            <div class="col-12 d-flex justify-content-center mt-3">
                <button class="btn btn-primary" name = 'submit' type="submit">Submit Form</button>
                <a href="listPertanyaan.php" class="btn btn-success me-md-2 ms-3">Kembali</a>
            </div>
        </form>
    </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
