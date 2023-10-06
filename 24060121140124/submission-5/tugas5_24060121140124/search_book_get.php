<!-- // Nama        : Fitra Syamli Yudhisaputra
// NIM          : 24060121140124
// Tanggal      : 3 Oktober 2023
// File        : search_book_get.php
// Deskripsi   : Mendapatkan informasi buku berdasarkan inputan user-->
<?php
require_once('./lib/db_login.php');
global $db;

$keyword = $_GET['keyword'];

// Assign a query
$query = "SELECT * FROM books WHERE title LIKE '%$keyword%'";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br />" . $db->error);
}

// Fetch and display the results
if (mysqli_num_rows($result)) {
    while ($row = $result->fetch_object()) {
        echo 'ISBN: ' . $row->isbn . '<br />';
        echo 'Author: ' . $row->author . '<br />';
        echo 'Title: ' . $row->title . '<br />';
        echo 'Price: ' . $row->price . '<br />';
        echo '<br>';
    }
} else {
    echo "Book data not found!";
}

$result->free();
$db->close();
?>