<!-- 
File      : search_book_get.php		02/10/23
Penulis   : Varrel / 24060121130062
Deskripsi : File untuk mengambil data book yang akan dicari dari database
-->

<?php
require_once('./lib/db_login.php');
global $db;
$keyword = $_GET['keyword'];

//Asign a query
$query = " SELECT * FROM books where title LIKE '%$keyword%' ";
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br />" . $db->error);
}
// Fetch and display the results
if (mysqli_num_rows($result)) {
    while ($row = $result->fetch_object()) {
        echo 'ISBN: ' . $row->isbn . '<br />';
        echo 'Author: ' . $row->author . '<br />';
        echo 'Tittle: ' . $row->title . '<br />';
        echo 'Price: ' . $row->price . '<br />';
        echo '<br>';
    }
} else {
    echo "Data buku tidak ditemukan!";
}

$result->free();
$db->close();
?>