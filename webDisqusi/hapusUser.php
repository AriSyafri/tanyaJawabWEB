<?php 

    session_start();
    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

    
    require 'functions.php';

    $id = $_GET["username"];

    if (hapusUser($id) > 0) {
        echo "
            <script> 
                alert('User berhasil dihapus');
                document.location.href='adminData.php';
            </script>
        ";
    } else {
        echo "
            <script> 
                alert('User gagal dihapus');
                document.location.href='adminData.php';
            </script>
        ";
    }
?>