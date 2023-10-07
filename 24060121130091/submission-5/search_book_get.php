<!-- Nama: Fa'iq Rindha Maulana -->
<!-- NIM: 24060121130091 -->
<!-- Lab: PBP A2 -->
<!-- Nama File: search_book_get.php -->
<!-- Deskripsi File: File untuk mengambil data buku yang dicari -->
<!-- Tanggal Pembuatan: 01/10/2023 -->

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
    echo "Data buku tidak ditemukan!";
}

$result->free();
$db->close();
?>