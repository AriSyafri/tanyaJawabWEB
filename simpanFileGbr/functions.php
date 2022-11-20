<?php
    // koneksi ke database
    $conn = mysqli_connect("localhost","root","","inputfile");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data){
        global $conn;
        $nama  = htmlspecialchars($data["nama"]);

        $gambar = upload();
        if (!$gambar) {
            return false;
        }

        $query = "INSERT INTO tbfile
        VALUES
        ('', '$nama','$gambar')";
        mysqli_query($conn, $query);

        // cek koneksi
        return mysqli_affected_rows($conn);

    }

    function upload(){
            $namaFile = $_FILES['gambar']['name'];
            $ukuranFILE = $_FILES['gambar']['size'];
            $error = $_FILES['gambar']['error'];
            $tmpName = $_FILES['gambar']['tmp_name'];

            // untuk wajib mengisi
            // if ($error === 4 ){
            //     echo "<script>
            //             alert('pilih gambar terlebih dahulu');
            //         </script>";
            //     return false;
            // }
            // penutup wajib mengisi


            // tanpa isi
            if ($error === 4 ){
                return "null";
            }
            // penutup tanpa isi
        
            // cek apakah yang diupload adalah gambar
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png','pdf'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));//ini ngambil ekstensi akhir
            if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
                echo "<script>
                        alert('yang anda upload bukan gambar');
                    </script>";
                return false;
            }
            
            // cek jika ukurannya terlalu besar
            if ( $ukuranFILE > 1000000) {
                echo "<script>
                        alert('ukuran yang anda upload melebihi kapasitas');
                    </script>";
                return false;
            }

            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            var_dump($namaFileBaru);
        
            move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        
            return $namaFileBaru;
    }  
    
    function ubah ($data) {
        global $conn;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        if ( $_FILES['gambar']['error'] === 4 ) {
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }

        $query = "UPDATE tbfile SET
                nama = '$nama',
                gambar = '$gambar'
            WHERE idorang = $id
            ";

        mysqli_query($conn, $query);

        // cek koneksi
        return mysqli_affected_rows($conn);
    }
?>