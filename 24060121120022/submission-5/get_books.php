<!--
    Nama Pembuat    : Aprilyanto Setiyawan Siburian
    NIM             : 24060121120022
    Lab             : A2 PBP
    Deskripsi       : File untuk pencarian data buku menggunakan AJAX
-->

<?php
    require_once('./lib/db_login.php');
    $title = $_GET['title'];
    //Assign Query
    $query = 'SELECT * FROM books WHERE title= "'.$title.'" ';
    $result = $db->query($query);
    $found = false;
    if(!$result){
        die("Could not query the database: <br/>".$db->error);
    }

    //fetch
    while($row = $result->fetch_object()){
        if($row->title == $title){
            echo '<br/>';
            echo 'ISBN       : '.$row->isbn.'<br/>';
            echo 'Author     : '.$row->author.'<br/>';
            echo 'Title      : '.$row->title.'<br/>';
            echo 'Price      : '.$row->price.'<br/>';
            $found = true;
        }
    }
    if($found == false){
        echo 'Not Found';
    }
    $result->free();
    $db->close();
?>