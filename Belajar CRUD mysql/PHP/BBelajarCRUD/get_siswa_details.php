<?php

$response = array();

require_once __DIR__ . '/db_connect.php';

$db = new DB_CONNECT();

if (isset($_GET["id"])) 
{

    $id = $_GET['id'];
    
    $result = mysql_query("SELECT *FROM siswa WHERE id = $id");
    if (!empty($result)) 
    {
        if (mysql_num_rows($result) > 0) 
        {
            $result = mysql_fetch_array($result);
            $siswa = array();
            $siswa["id"] = $result["id"];
            $siswa["nisn"] = $result["nisn"];
            $siswa["nama"] = $result["nama"];
            $siswa["kelas"] = $result["kelas"];
            $siswa["alamat"] = $result["alamat"];

            $response["success"] = 1;
            
            $response["siswa"] = array();
            array_push($response["siswa"], $siswa);
            echo json_encode($response);
       } else {
          
            $response["success"] = 0;
            $response["message"] = "Tidak ada data";

            echo json_encode($response);
        }
    } else {
        $response["success"] = 0;
        $response["message"] = "Tidak ada data";

        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Silahkan lengkapi permintaan anda";

    echo json_encode($response);
}
?>
