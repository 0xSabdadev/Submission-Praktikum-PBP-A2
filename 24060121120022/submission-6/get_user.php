<?php
// Nama : Aprilyanto Setiyawan Siburian
// Nim  : 24060121120022
// Lab  : A2

require_once './lib/db_login.php';

$email = $_GET['email'];
$query = "SELECT * FROM tb_user WHERE email = '$email'";
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br/>" . $db->error);
} else {
    echo $result->num_rows > 0;
}
?>
