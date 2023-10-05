<?php
// Agung Surya Permana
// 24060121140167

// TODO 1 : setup & connect database
$db_host = "localhost";
$db_database = "responsi";
$db_username = "root";
$db_password = "BismillahKaya123";

// Connect Database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno) {
    die("Could not connect to the database: <br />" . $db->connect_error);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
