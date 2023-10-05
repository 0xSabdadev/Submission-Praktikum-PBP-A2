<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : file yang berisi koneksi ke database
 -->

<?php
$db_host = 'localhost';
$db_database = 'bookorama';
$db_username = 'root';
$db_password = '';

// koneksi ke database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno) {
    die("Could not connect to the database: <br />" . $db->connect_error);
}

// deklarasi fungsi test_input untuk menguji inputan
function test_input($data)
{ 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}