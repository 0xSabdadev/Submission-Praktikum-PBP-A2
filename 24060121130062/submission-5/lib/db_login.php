<!-- 
File      : db_login.php		02/10/23
Penulis   : Varrel / 24060121130062
Deskripsi : bagian untuk melakukan connect ke database dan test_input
-->

<?php
$db_host = 'localhost';
$db_database = 'bookorama';
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
?>