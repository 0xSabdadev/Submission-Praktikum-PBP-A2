<?php
// Nama : Elisabeth zefanya putri
// Nim  : 24060121120032
// lab  : A2

require_once 'lib/db_login.php';

/* TODO 7 : mengambil data user dari tabel 'tb_user' dengan paramater email */

    $email = $_GET['email'];
    $query = "SELECT * FROM tb_user WHERE email = '$email'";
    $result = $db->query($query);
    if (!$result){
        die ("Could not query the database: <br/>" . $db->error);
    }
    while ($row = $result->fetch_object()){
        echo "tersedia";
        exit;
    }
    $result->free();
    $db->close();


?>