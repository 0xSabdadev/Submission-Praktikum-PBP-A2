<!-- 
    Nama - NIM      : Duma Mora Arta Sitorus - 24060121120004
    Deskripsi Kode  : File untuk menampilkan hasil pencarian pada search_book.php
-->
<?php
    // TODO 1: Buat koneksi dengan database
    require_once('./lib/db_login.php');

    // TODO 2: Tulis dan eksekusi query ke database dengan filter
    $query = "SELECT b.isbn AS ISBN, b.author AS Author, 
    b.title AS Title, b.price AS Price, c.name AS Category 
    FROM books b, categories c 
    WHERE b.categoryid = c.categoryid";

    
    // Filter berdasarkan judul buku
    if (!empty($_POST['title'])) {
        $title = $db->real_escape_string($_POST['title']);
        $query .= " AND b.title LIKE '%$title%'";
    }

    $query .= " ORDER BY b.isbn";

    $result = $db->query($query);
    if (!$result) {
        die("Could not connect to database: <br />" . $db->error . "<br>Query: " . $query);
    }

    // TODO 3: Parsing data yang diterima dari database ke halaman HTML/PHP
    if ($result->num_rows > 0) {
        $output = null;
        while ($row = $result->fetch_object()) {
            echo '<div style="margin:20px;padding:5px;">';
            $output .= '<div id="book-table" style="color:green;background-color:RGB(144, 238, 144);  text-align: center; justify-content: center;">';
            $output .= '<p>ISBN: ' . $row->ISBN . '</p>';
            $output .= '<p>Title: ' . $row->Title . '</p>';
            $output .= '<p>Category: ' . $row->Category . '</p>';
            $output .= '<p>Author: ' . $row->Author . '</p>';
            $output .= '<p>Price: ' . $row->Price . '</p>';
            $output .= '</div>';
            echo '</div>';
        }
        $output .= '</div>';
    } else {
        $output = "Tidak ada hasil pencarian.";
    }
    
    echo $output;
    echo '<br />';
    // TODO 4: Lakukan dealokasi variabel $result
    $result->free();

    // TODO 5: Tutup koneksi dengan database
    $db->close();
?>