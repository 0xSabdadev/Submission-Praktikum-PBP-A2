<?php
// Nama File : add_customer_get.php
// Deskripsi : Menambahkan customer baru ke database melalui metode GET menggunakan ajax
// Nama      : Dorino Baharson
// Tanggal   : 3 Oktober 2023
// NIM       :24060121130090 

require_once('./lib/db_login.php');

$name = $db->real_escape_string($_GET['name']);
$address = $db->real_escape_string($_GET['address']);
$city = $db->real_escape_string($_GET['city']);

// Assign a query
$query = "INSERT INTO customers (name, address, city) VALUES ('" . $name . "', '" . $address . "', '" . $city . "')";
$result = $db->query($query);

if (!$result) {
    // TODO 1: Jika error, tulislah response yang sesuai
    echo '<div class="alert alert-danger alert-dismissiible"><strong>Error!</strong> Could not query the database<br>'. $db->error. '<br>query = '.$query.'</div>';
} else {
    // TODO 2: Jika sukses, tulislah response yang sesuai
    echo '<div class="alert alert-success alert-dimissible">
        <strong>Success!</strong> Customer has been added.<br>
        Name: '.$_GET['name'].'<br>
        Address: '.$_GET['address'].'<br>
        City: '.$_GET['city'].'<br>
        </div>';
}

// Close DB Connection
$db->close();
