<?php

    $conn = mysqli_connect("localhost","root","","protoquora");

    // menampikan data
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }



    function menambahPertanyaan($data) {
        global $conn;

        $bertanya = htmlspecialchars($data["tanya"]);
        $username = htmlspecialchars($data["usertanya"]);

        $query = "INSERT INTO pertanyaan (pertanyaan, username)
        VALUES ('$bertanya', '$username')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function menambahJawaban($data) {
        global $conn;

        $jawab = htmlspecialchars($data["jawab"]);
        $idtanya = htmlspecialchars($data["idtanya"]);
        $username = htmlspecialchars($data["userjawab"]);

        $query = "INSERT INTO jawaban (jawaban , idpertanyaan, username)
        VALUES ('$jawab', '$idtanya', '$username')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

    }


    function tambahUser($data) {
        global $conn;

        $username = htmlspecialchars($data["usName"]);
        $nama = htmlspecialchars($data["nama"]);
        $pass1 = mysqli_real_escape_string($conn, $data["pass"]);
        $pass2 = mysqli_real_escape_string($conn, $data["pass2"]);
        $job = mysqli_real_escape_string($conn, $data["job"]);
        
        // cek username
        $result = mysqli_query($conn, "SELECT username FROM user WHERE
        username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('username sudah terdaftar');
            </script>";
            return false;
        }

        if ($pass1 !== $pass2) {
            echo "<script>
                alert('Password tidak sesuai');
            </script>";
            return false;
        }

        // enkripsi pass
        $password = password_hash($pass1, PASSWORD_DEFAULT);

        // tambahkan usern baru ke db
        mysqli_query($conn, "INSERT INTO user VALUES('$username', '$password', '$nama', '$job')");

        return mysqli_affected_rows($conn);
    }

    function cariTanya($keyword) {
        $query = "SELECT * from pertanyaan
                WHERE pertanyaan LIKE '%$keyword%' OR
                username LIKE '%$keyword%'
        ";
        return query($query);
    }

    function hapusPertanyaan ($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM pertanyaan WHERE idpertanyaan = $id");
        return mysqli_affected_rows($conn);
    }

    function hapusJawaban ($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM jawaban WHERE idjawaban = $id");
        return mysqli_affected_rows($conn);
    }

    function hapusUser ($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM user WHERE username = '$id'");
        return mysqli_affected_rows($conn);
    }

    function ubahTanya($data) {
        global $conn;

        $id = $data["idpertanyaan"];
        $tanya = htmlspecialchars($data["pertanyaan"]);


        $query = "UPDATE pertanyaan SET
                    idpertanyaan = '$id',
                    pertanyaan = '$tanya'
                WHERE idpertanyaan = $id
                    ";

        mysqli_query($conn, $query);
        // cek koneksi
        return mysqli_affected_rows($conn);

    }

    function ubahJawab($data) {
        global $conn;

        $id = $data["idjawaban"];
        $jawab = htmlspecialchars($data["jawaban"]);

        $query = "UPDATE jawaban SET
                    idjawaban = '$id',
                    jawaban = '$jawab'
                WHERE idjawaban = '$id'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function ubahUser($data) {
        global $conn;

        $id = $data["username"];
        $nama = htmlspecialchars($data["nama"]);
        $job = htmlspecialchars($data["job"]);

        $query = "UPDATE user SET
                    username = '$id',
                    nama = '$nama',
                    job = '$job'
                WHERE username = '$id'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);


    }
?>