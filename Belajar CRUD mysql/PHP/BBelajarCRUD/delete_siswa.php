<?php

$response = array();

if (isset($_POST['id'])) 
{
    $id = $_POST['id'];

    require_once __DIR__ . '/db_connect.php';

    $db = new DB_CONNECT();

    $result = mysql_query("DELETE FROM siswa WHERE id = $id");
    
    if (mysql_affected_rows() > 0)
    {
        $response["success"] = 1;
        $response["message"] = "Data berhasil di hapus";

        echo json_encode($response);
    } 
    else 
    {
        $response["success"] = 0;
        $response["message"] = "Tidak ada data yang tersedia";

        echo json_encode($response);
    }
} 
else 
{
    $response["success"] = 0;
    $response["message"] = "Aksi tidak bisa di lakukan";
    echo json_encode($response);
}
?>
