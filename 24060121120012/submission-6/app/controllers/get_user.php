<?php
/*
Nama : Emerio Kevin Aryaputra
NIM : 24060121120012
Lab : PBP A2
*/

require_once('../models/db_login.php');

$email = $_GET['email'];

$query = "SELECT * FROM tb_user WHERE email = '$email'";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" . $db->error);
} else {
    if ($result->num_rows == 0) {
        echo 'Email tersedia';
    } else {
        echo 'Email telah digunakan';
    }
}
