<?php
// NAMA : Zenobia Wirandi Zenaide
// NIM : 24060121140164
// Lab : PBP A2

require_once 'lib/db_login.php';
$email = $_GET['email'];
$query = "SELECT * FROM tb_user WHERE email = '$email'";
$result = $db->query($query);

echo $result->num_rows > 0;
