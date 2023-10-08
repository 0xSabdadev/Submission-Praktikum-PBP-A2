<?php

$id = $_GET['id']; 

require_once('./lib/db_login.php');

$query = " DELETE FROM customers WHERE customerid=".$id." ";


$result = $db->query($query);

if (!$result){
    die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
} else{
    //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
    $db->close();
    header('Location: view_customer.php');
}

?>
