<?php
    require 'functions.php';

    $id=$_GET["idorang"];

    $data = query("SELECT * FROM tbfile where idorang = $id")[0];
    if ( isset($_POST["submit"]) ){
    
        // cek apakah data berhasil ubah atau tidak
        if ( ubah($_POST) > 0 ) {
            // bagian fungsi redirect pake javascript
            echo "
                <script>
                    alert ('data berhasil diubah');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert ('data gagal diubah');
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
                <input type="hidden" name="gambarLama" value="<?= $data["gambar"]; ?>">
                <input type="hidden" name="id" value="<?= $data["idorang"]; ?>">
                
                <div class="">
                <label for="validationCustom01" class="form-label">Masukan nama anda : </label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $data["nama"]?>" required>
                </div>

                <div class="">
                <img src="img/<?= $data['gambar']; ?>" width= "500"><br>
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
