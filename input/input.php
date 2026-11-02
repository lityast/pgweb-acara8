<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "pgweb_acara8";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kecamatan       = $_POST['kecamatan'];
        $luas            = $_POST['luas'];
        $jumlah_penduduk = $_POST['jumlah_penduduk'];
        $longitude       = $_POST['longitude'];
        $latitude        = $_POST['latitude'];

        $sql = "INSERT INTO latihan (kecamatan, longitude, latitude, luas, jumlah_penduduk) 
                VALUES ('$kecamatan', '$longitude', '$latitude', '$luas', '$jumlah_penduduk')";

        if ($conn->query($sql) === TRUE) {
            // Arahkan kembali ke index.php di folder utama (root)
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>