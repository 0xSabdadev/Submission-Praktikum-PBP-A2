<?php
/*
Nama         : Emerio Kevin Aryaputra
NIM          : 24060121120012
Lab          : PBP A2
File         : db_login.php
Deskripsi    : Memuat informasi login ke database serta membuat fungsi test_input
*/

$db_host = 'localhost:3306';
$db_database = 'bookorama_praktikum';
$db_username = 'root';
$db_password = '';

//  Connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno) {
    die('Could not connect to the database: <br/>' . $db->connect_error);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
