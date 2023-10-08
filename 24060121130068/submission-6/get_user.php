<?php
// Nama : Mitslina
// Nim  : 24060121130068
// lab  : A2

require_once ('./lib/db_login.php');

/* TODO 7 : mengambil data user dari tabel 'tb_user' dengan paramater email */
$email = $_GET['email'];

$query = "SELECT email FROM tb_user WHERE email = '$email'";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}

if ($result->num_rows > 0) {
    echo "used";

} else {
    echo "available";
}

$result->free();
$db->close();
?>
