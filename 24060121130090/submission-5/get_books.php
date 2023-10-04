<?php
// Nama File : get_books.php
// Deskripsi : Menambahkan customer baru ke database melalui metode GET menggunakan ajax
// Nama      : Dorino Baharson
// Tanggal   : 3 Oktober 2023
// NIM       :24060121130090

    require_once('./lib/db_login.php');
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
            echo 'isbn      : '.$row->isbn.'<br/>';
            echo 'author   : '.$row->author.'<br/>';
            echo 'title      : '.$row->title.'<br/>';
            echo 'price      : '.$row->price.'<br/>';
            $found = true;
        }
    }
    if($found == false){
        echo 'Not Found';
    }
    $result->free();
    $db->close();
?>