<!--
    Nama Pembuat    : Aprilyanto Setiyawan Siburian
    NIM             : 24060121120022
    Lab             : A2 PBP
    Deskripsi       : Implementasi delete_customer.php pada modul praktikum 4
-->

<?php
require_once('./lib/db_login.php');

$id = $_GET['id'];

$query = "DELETE FROM customers WHERE customerid = " . $id;
$result = $db->query($query);

if (!$result) {
  die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
} else {
  header('Location: view_customer.php');
}

$db->close();
