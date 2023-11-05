<?php
    require_once('./lib/db_login.php');
    $title = $_GET['title'];
    //Asign a query
    $query = "SELECT * FROM books where title='".$title."'";
    $result = $db->query($query);
    if (!$result){
        die ("Could not query the database: <br />". $db->error);
    }
    // Fetch and display the results
    while ($row = $result->fetch_object()){
        echo 'ISBN: '.$row->isbn.'<br />';
        echo 'Author: '.$row->author.'<br />';
        echo 'Title: '.$row->title.'<br />';
        echo 'Price: $'.$row->price.'<br />';
    }
    $result->free();
    $db->close();
?>