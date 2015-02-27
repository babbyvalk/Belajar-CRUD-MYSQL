<?php

$response = array();


require_once __DIR__ . '/db_connect.php';

$db = new DB_CONNECT();


$result = mysql_query("SELECT *FROM siswa") or die(mysql_error());

if (mysql_num_rows($result) > 0) {

    $response["siswa"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        $siswa = array();
        $siswa["id"] = $row["id"];
        $siswa["nisn"] = $row["nisn"];
        $siswa["nama"] = $row["nama"];
        $siswa["kelas"] = $row["kelas"];
        $siswa["alamat"] = $row["alamat"];


        array_push($response["siswa"], $siswa);
    }
    $response["success"] = 1;

    echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "Tidak ada data yang ditemukan";

    echo json_encode($response);
}
?>
