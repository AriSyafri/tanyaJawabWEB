<?php
    session_start();

    require 'functions.php';   
    
    $user = query("SELECT * FROM user");


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
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="listPertanyaan.php">Pertanyaan</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Admin</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Keluar</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- penutup navbar -->

    <!-- isi konten -->

    <div class="container">
        <h1 style="padding-top: 5rem; text-align:center;">Selamat Datang Admin</h1>
        <a class="btn btn-secondary" href="tambahUserAdmin.php">Buat User Baru</a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Role</th>
                <th scope="col" style='text-align:center; vertical-align:middle'>Aksi</th>
                </tr>
            </thead>

            <?php foreach($user as $row) : ?>
            <tbody class="table-group-divider">
                <tr>
                <td><?= $row["username"]?></td>
                <td><?= $row["nama"]?></td>
                <td><?= $row["job"]?></td>
                <td style='text-align:center; vertical-align:middle'>
                    <a class="btn btn-success" href="ubahUser.php?username=<?=$row['username'];?>">Ubah</a>
                    <a class="btn btn-danger" href="hapusUser.php?username=<?=$row['username'];?>" onclick="return confirm('yakin?');">Hapus</a>
            
                </td>

                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>



    <!-- penutup konten -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  
</body>
</html>