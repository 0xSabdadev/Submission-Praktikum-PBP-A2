<?php
    require_once('./lib/db_login.php');

    $keyword = $_GET['keyword'];
    $query = "SELECT * FROM books WHERE title LIKE '%$keyword%'";
    $result = $db->query($query);

    if (!$result) {
        die("Could not query the database: <br />" . $db->error);
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_object()) {
            echo 'ISBN: ' . $row->isbn . '<br />';
            echo 'Author: ' . $row->author . '<br />';
            echo 'Title: ' . $row->title . '<br />';
            echo 'Price: ' . $row->price . '<br /><br />';
        }
    } else {
        echo "Book data not found!";
    }

    $result->free();
    $db->close();
?>
