<?php 

    session_start();
    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

    
    require 'functions.php';

    $id = $_GET["idpertanyaan"];

    if (hapusPertanyaan($id) > 0) {
        echo "
            <script> 
                alert('pertanyaan berhasil dihapus');
                document.location.href='listPertanyaan.php';
            </script>
        ";
    } else {
        echo "
            <script> 
                alert('pertanyaan gagal dihapus');
                document.location.href='listPertanyaan.php';
            </script>
        ";
    }
?>