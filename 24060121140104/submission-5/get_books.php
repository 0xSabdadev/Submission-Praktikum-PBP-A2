<?php
    require_once 'db_login.php';
    $booktitle = $_GET['title'];
    //Assign Query
    $query = 'SELECT * FROM books WHERE title= "'.$booktitle.'" ';
    $result = $db->query($query);
    $found = false;
    if(!$result){
        die("Could not query the database: <br/>".$db->error);
    }

    //fetch
    while($row = $result->fetch_object()){
        if($row->title == $booktitle){
            echo '<br/>';
            echo 'ISBN      : '.$row->isbn.'<br/>';
            echo 'Author    : '.$row->author.'<br/>';
            echo 'Title     : '.$row->title.'<br/>';
            echo 'Price     : '.$row->price.'<br/>';
            $found = true;
        }
    }
    if($found == false){
        echo 'Not Found';
    }
    $result->free();
    $db->close();
?>