<?php
require_once 'db_login.php';
$booktitle = $_GET['title'];
$query = 'SELECT * FROM books WHERE title= "' . $booktitle . '" ';
$result = $db->query($query);
$found = false;
if (!$result) {
    die("Could not query the database: <br/>" . $db->error);
}
while ($row = $result->fetch_object()) {
    if ($row->title == $booktitle) {
        echo '<br/>';
        echo 'isbn      : ' . $row->isbn . '<br/>';
        echo 'author   : ' . $row->author . '<br/>';
        echo 'title      : ' . $row->title . '<br/>';
        echo 'price      : ' . $row->price . '<br/>';
        $found = true;
    }
}
if ($found == false) {
    echo 'Not Found';
}
$result->free();
$db->close();
