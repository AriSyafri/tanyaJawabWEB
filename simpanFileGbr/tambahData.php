<?php

  require 'functions.php';

  if ( isset($_POST["submit"]) ){
    if (tambah($_POST) > 0 ) {
        echo "
            <script>
                alert ('data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert ('data gagal ditambahkan');
                document.location.href = 'index.php';
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
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="container">

    <h1>Hello, world!</h1>
    <form action="" method="post" enctype="multipart/form-data">
            <div class="">
                <label for="validationCustom01" class="form-label">Masukan nama anda : </label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
            
            <div class="">
                <label>Masukan file anda</label>
                <input type="file" class="form-control" name="gambar" id="gambar">
            </div>

            <div class="col-12 d-flex justify-content-center mt-3">
                <button class="btn btn-primary" name='submit' type="submit">Submit Form</button>
                <a href="index.php" class="btn btn-success me-md-2 ms-3">Kembali</a>
            </div>
      </form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
