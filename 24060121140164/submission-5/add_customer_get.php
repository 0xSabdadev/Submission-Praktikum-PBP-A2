<?php
require_once('./lib/db_login.php');

$name = $db->real_escape_string($_GET['name']);
$address = $db->real_escape_string($_GET['address']);
$city = $db->real_escape_string($_GET['city']);

$query = "INSERT INTO customers (name, address, city) VALUES ('" . $name . "', '" . $address . "', '" . $city . "')";
$result = $db->query($query);

if (!$result) {
    echo '<div class="alert alert-danger alert-dismissable"><strong>Error</strong> Could not query the database. 
            <br>'.$db->error.'<br>query = '.$query. '</div>';
} else {
    echo '<div class="alert alert-success alert-dismissable"><strong>Success</strong> Data hass been added.<br>
        Name: '.$_GET['name'].'<br>
        Address: '.$_GET['address'].'<br>
        City: '.$_GET['city'].'<br>
        </div>';
}

$db->close();
