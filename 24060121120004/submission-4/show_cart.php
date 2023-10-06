<!-- 
Nama : Duma Mora Arta Sitorus
NIM  : 24060121120004
Lab  : A2
-->

<?php
// File         : show_cart.php
// Deskripsi    : Untuk menambahkan item ke shopping cart dan menampilkan isi shopping cart

session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Periksa apakah parameter "from" ada dan nilainya adalah "view_books"
    if (isset($_GET['from']) && $_GET['from'] === 'view_books') {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Cek apakah buku sudah ada dalam keranjang
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]++;
        } else {
            $_SESSION['cart'][$id] = 1;
        }
    }
}

?>
<?php include('./header.php') ?>
<br>
<div class="card mt-4">
    <div class="card-header">Shopping Cart</div>
    <div class="card-body">
        <br>
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Price * Qty</th>
            </tr>
            <?php
            require_once('./lib/db_login.php');
            $sum_qty = 0;
            $sum_price = 0;

            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $id => $qty) {
                // TODO 1: Tuliskan dan eksekusi query
                    $query = " SELECT * FROM books WHERE isbn = '".$id."'";
                    $result = $db->query($query);
                    if(!$result){
                        die("Could not query the database: <br>".$db->error."<br>Query:".$query);
                    }

                    while ($row = $result->fetch_object()) {
                        echo '<tr>';
                        echo '<td>' . $row->isbn . '</td>';
                        echo '<td>' . $row->author . '</td>';
                        echo '<td>' . $row->title . '</td>';
                        echo '<td>$' . $row->price . '</td>';
                        echo '<td>' . $qty . '</td>';
                        echo '<td>$' . $row->price * $qty . '</td>';
                        echo '</tr>';

                        $sum_qty = $sum_qty + $qty;
                        $sum_price = $sum_price + ($row->price * $qty);
                    }
                }
                echo '<tr><td></td><td></td><td></td><td></td><td></td><td>$' . $sum_price . '</td>';
                $result->free();
                $db->close();
            } else {
                echo '<tr><td colspan="6" align="center">There is no item in shopping cart</td></tr>';
            }
            ?>
        </table>
        Total items = <?php echo $sum_qty ?><br><br>
        <a class="btn btn-primary" href="view_books.php">Continue Shopping</a>
        <a class="btn btn-danger" href="delete_cart.php">Empty Cart</a>
    </div>
</div>
<?php include('./footer.php') ?>