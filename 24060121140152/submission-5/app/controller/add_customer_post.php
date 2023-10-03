<!-- 
    Program: add_customer_post.php
    Nama: Adri Audifirst
    NIM: 24060121140152
    Deskripsi: Menambahkan data pelanggan dengan POSt
    Date: 3 September 2023
 -->
<?php
require_once('../model/db_login.php');

$name = $db->real_escape_string($_POST['name']);
$address = $db->real_escape_string($_POST['address']);
$city = $db->real_escape_string($_POST['city']);

$query = "INSERT INTO customers (name, address, city) VALUES ('" . $name . "', '" . $address . "', '" . $city . "')";
$result = $db->query($query);

if (!$result) {
    echo '<div class="alert alert-danger alert-dismissable">
        <strong>Error!</strong> Could not query the database.<br>'
        . $db_error . '<br> Query = ' . $query . ' 
            </div>';
} else {
    echo '<div class="alert alert-success alert-dismissable">
            <strong>Success!</strong> Data has been added.<br>
            Name : ' . $_POST['name'] . '<br>
            Address : ' . $_POST['address'] . '<br>
            City : ' . $_POST['city'] . '<br>
            </div>';
}

$db->close();
