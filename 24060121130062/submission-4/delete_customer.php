<!-- 
File      : delete_customer.php		22/09/23
Penulis   : Varrel / 24060121130062
Deskripsi : untuk menghapus customer yang ada dari web dan database
-->

<?php
$id = $_GET['id'];
// Include our login information
require_once('./lib/db_login.php');
//Asign a query
$query = " DELETE FROM customers WHERE customerid=" . $id . " ";
// Execute the query
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br />" . $db->error);
} else {
    $db->close();
    header('Location: view_customer.php');
}
//close db connection
$db->close();
?>