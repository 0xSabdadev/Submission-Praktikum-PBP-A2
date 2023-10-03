<?php
require_once('db_login.php');
$keywords = $db->real_escape_string($_GET['keywords']);

$query = "SELECT * FROM books WHERE title LIKE \"%" . $keywords . "%\"";
$result = $db->query($query);
if (!$result) {
   die("Could not query the database: <br />" . $db->error);
}

echo '<ul class="list-group">';
echo '<li class="list-group-item active">Result</a>';
foreach ($result as $row) {
   echo '<li class="list-group-item flex-column align-items-start">' . $row['title'] . '<br />';
   echo '<small id="detail_book" class="text-muted">';
   echo 'ISBN: ' . $row['isbn'] . '<br />';
   echo 'Author: ' . $row['author'] . '<br />';
   echo 'Title: ' . $row['title'] . '<br />';
   echo 'Price: ' . $row['price'] . '<br /><br />';
   echo '</small>';
   echo '</li>';
}
echo '</ul>';

$result->free();
$db->close();
