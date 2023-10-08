<?php 
// TODO 1: Buatlah koneksi dengan database

$db_host='localhost';
$db_database='bookorama';
$db_username='root';
$db_password='';

//connect to database
$db = new mysqli("localhost", "root", "", "bookorama", "4306");
if ($db->connect_errno) {
    die ("Could not connect to database: <br />". $db->connect_error);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>