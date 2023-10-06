<?php
// Nama : Fitra Syamli Yudhisaputra
// Nim  : 24060121140124
// lab  : A2
// Tanggal : 05/10/2023 
require_once './lib/db_login.php';

/* TODO 7 : mengambil data user dari tabel 'tb_user' dengan paramater email */
$email = $_GET['email'];
$query = "SELECT * FROM tb_user WHERE email = '$email'";
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br/>" . $db->error);
} else {
    echo $result->num_rows == 0;
}