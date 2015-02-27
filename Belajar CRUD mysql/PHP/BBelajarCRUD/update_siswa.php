<?php

$response = array();

if (isset($_POST['id']) && isset($_POST['nisn']) && isset($_POST['nama']) && isset($_POST['kelas']) && isset($_POST['alamat'])) {
    
    $id = $_POST['id'];
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    require_once __DIR__ . '/db_connect.php';

    $db = new DB_CONNECT();

    $result = mysql_query("UPDATE siswa SET nisn = '$nisn', nama = '$nama', kelas = '$kelas', alamat = '$alamat' WHERE id = $id");

    if ($result) 
    {
        $response["success"] = 1;
        $response["message"] = "Data anda berhasil di perbarui";
        echo json_encode($response);
    } 
    else 
    {
        
    }
} 
else 
{
    $response["success"] = 0;
    $response["message"] = "Mohon kelengkapan data anda";
    echo json_encode($response);
}
?>
