<!-- 
    Program: get_book.php
    Nama: Adri Audifirst
    NIM: 24060121140152
    Deskripsi: Mengambil data buku
    Date: 3 September 2023
 -->
<?php

require_once('../model/db_login.php');

// TODO 1: Ambil value dari query string parameter id
$title = isset($_GET['title']) ? $_GET['title'] : '';

if (!empty($title)) {
    // TODO 2: Tuliskan dan eksekusi query untuk mendapatkan informasi customer
    $query = "SELECT * FROM books WHERE title LIKE '%$title%'";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br>" . $db->error);
    }

    // TODO 3: Tuliskan response
    while ($row = $result->fetch_object()) {
        echo '<div class="book-detail container p-4 bg-light rounded mb-4">';
        echo 'ISBN   : ' . $row->isbn . '<br>';
        echo 'Title  : ' . $row->title . '<br>';
        echo 'Author : ' . $row->author . '<br>';
        echo 'Price  : $' . $row->price . '<br>';
        echo '</div>';
    }

    // TODO 4: Dealokasi variabel dan tutup koneksi database
    $result->free();
    $db->close();
} else {
    echo '';
}
