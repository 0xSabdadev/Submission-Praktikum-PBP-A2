<?php

require_once('./lib/db_login.php');
$title = $db->real_escape_string($_GET['title']);
$query = " SELECT * FROM books WHERE title LIKE '%" .$title. "%'";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}

while ($row = $result->fetch_object()) {
    echo '<br/>';
    echo 'ISBN: '.$row->isbn.'<br/>';
    echo 'Author: '.$row->author.'<br/>';
    echo 'Title: '.$row->title.'<br/>';
    echo 'Price: '.$row->price.'<br/>';
}

$result->free();
$db->close();

?>