<?php
    require 'functions.php';
    
    $usName = $_GET["username"];

    $user = query("SELECT * FROM user where username = '$usName'")[0];

    if (isset ($_POST["submit"])) {
        if (ubahUser($_POST) > 0) {
            echo "
                <script>
                    alert('User telah diubah');
                    document.location.href = 'adminData.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('User gagal diubah');
                    document.location.href = 'adminData.php';
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
        <title>tambah user</title>
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

    <!-- penutup navbar -->

    <div class="container">

        <h1 style="padding-top: 5rem;">Selamat datang di Halaman Pengubahan User</h1>
        <form class="" method="post">

            <input type="hidden" name="username" id="username" value="<?=$user["username"]?>">

            <div class="">
                <label for="validationCustom01" class="form-label">Masukan nama anda : </label>
                <input type="text" class="form-control" name="nama" id="nama" required value="<?= $user["nama"]?>">
                <div class="valid-feedback">
                Data diterima
                </div>
            </div>

            <div class="">
            <label for="status" class="col-sm-2 col-form-label">Pilih Role : </label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="job" id="job" required>
                    <option selected>Silahkan Pilih Role</option>
                    <?php
                        if("admin" == $user["job"]) {
                            print '<option value="admin" class="text-primary" selected>Admin</option>';
                            print '<option value="user">user</option>';
                        } else if ("user" == $user["job"]){
                            print '<option value="admin">Admin</option>';
                            print '<option value="user" class="text-primary" selected>User</option>';
                        }
                    ?>
                </select>
            </div>
        </div>


            <div class="col-12 d-flex justify-content-center mt-3">
                <button class="btn btn-primary" name = 'submit' type="submit">Submit Form</button>
                <a href="adminData.php" class="btn btn-success me-md-2 ms-3">Kembali</a>
            </div>
        </form>
    </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
