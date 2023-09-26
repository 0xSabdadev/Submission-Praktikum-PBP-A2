<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : Implementasi modul pertemuan 4 (db_login.php)
-->

<?php
$db_host = 'localhost';
$db_database = 'bookorama';
$db_username = 'root';
$db_password = '';

//Connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno){
    die ("Tidak menghubungkan database: <br />". $db->connect_error);
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>