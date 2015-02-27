<?php

$response = array();

if (isset($_POST['nisn']) && isset($_POST['nama']) && isset($_POST['kelas']) && isset($_POST['alamat'])) {
    
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    require_once __DIR__ . '/db_connect.php';

    $db = new DB_CONNECT();

    $result = mysql_query("INSERT INTO siswa(nisn, nama, kelas, alamat) VALUES ('$nisn', '$nama', '$kelas', '$alamat')");

    if ($result) {
        $response["success"] = 1;
        $response["message"] = "membuat data berhasil";

        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "Sistem mendeteksi kesalahan, silahkan coba lagi";
        
        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Silahkan lengkapi aksi sebelum memulai permintaan anda";
    
    echo json_encode($response);
}
?>
