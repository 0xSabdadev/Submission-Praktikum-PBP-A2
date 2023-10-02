<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : file yang di-request
 -->

<?php
    require_once('db_login.php');
    $title = $_GET['id'];

    // mengambil data buku berdasarkan judul buku
    $query = "SELECT * FROM books where title='".$title."'";
    $result = $db->query($query);
    if (!$result){ // jika query gagal dieksekusi
        die ("Could not query the database: <br />". $db->error);
    }

    // iterasi hasil query untuk mengambil data buku
    while ($row = $result->fetch_object()){
        echo 'Author : '.$row->author.'<br />';
        echo 'Title  : '.$row->title.'<br />';
        echo 'Price  : '.$row->price.'<br />';
    }

    // dealokasi memory
    $result->free();
    $db->close();
?>