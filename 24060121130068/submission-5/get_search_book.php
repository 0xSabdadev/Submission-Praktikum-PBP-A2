<?php
// File         : get_search_book.php
// Deskripsi    : File yang direquest oleh search_book.php
// Nama         : Mitslina

require_once('./lib/db_login.php');

// TODO 1: Ambil value dari query string
$title = $_GET['title'];

// TODO 2: Tuliskan dan eksekusi query untuk mendapatkan informasi customer
$query = "SELECT books.isbn AS isbn, books.title AS title, books.author AS author, categories.name AS categoryname, books.price AS price
          FROM books
          INNER JOIN categories ON books.categoryid = categories.categoryid
          WHERE books.title = '" . $db->real_escape_string($title) . "'";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}

// TODO 3: Tuliskan response
if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        echo 'ISBN: ' . $row->isbn . '<br />';
        echo 'Title: ' . $row->title . '<br />';
        echo 'Author: ' . $row->author . '<br />';
        echo 'Category: ' . $row->categoryname . '<br />';
        echo 'Price: ' . $row->price . '<br />';
    }
} else {
    echo "Book title not found";
}

// TODO 4: Dealokasi variabel dan tutup koneksi database
$result->free();
$db->close();
?>
