<?php
// Nama : Dorino Baharson
// Nim  : 24060121130090
// lab  : A2

require_once 'lib/db_login.php';

/* TODO 7 : mengambil data user dari tabel 'tb_user' dengan paramater email */
$email = $_GET['email'];
$query = "SELECT * FROM tb_user WHERE email = '$email'";
$result = $db->query($query);

echo $result->num_rows > 0;
?>