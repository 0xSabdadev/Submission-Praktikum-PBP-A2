<?php
require_once('../ajax-starter/lib/db_login.php');

$title = $_GET['title'];

$query = 
    "SELECT b.isbn AS isbn, b.author AS author, b.title AS title, b.price AS price, c.name AS category, b.stock AS stock
    FROM books b
    JOIN categories c ON b.categoryid = c.categoryid 
    WHERE b.title LIKE '%". $title ."%' ";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}

echo '
<div class="container">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>ISBN</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Stock</th>
                </tr>
';

while ($row = $result->fetch_object()) {
    echo '<tr>';
        echo '<td>'. $row->isbn .'</td>';
        echo '<td>'. $row->author .'</td>';
        echo '<td>'. $row->title .'</td>';
        echo '<td>'. $row->price .'</td>';
        echo '<td>'. $row->category .'</td>';
        echo '<td>'. $row->stock .'</td>';
    echo '</tr>';
}

echo '      </table>
        </div>
    </div>
</div>';

$result->free();
$db->close();

?>