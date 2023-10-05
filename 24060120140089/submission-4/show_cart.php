<!--Nama: Sheva Ivanda Pratama
    NIM : 24060120140089
    Lab : A2-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bookrama</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        
        <style>
            .error{
                color: red;
            }
        </style>
    </head>
    <body>
    <?php
    //File      : login.php
    //Deskripsi : menampilkan form login dan melakukan login ke halaman admin.php

    session_start(); //inisialisasi session
    //$id = $_GET['id'];
    $id = !empty($_GET['id']) ? $_GET['id']:'';
    if($id != ""){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }

        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]++;
        }else{
            $_SESSION['cart'][$id] = 1;
        }
    }
    ?>
        <br>
        <div class="card">
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
        // include our login information
        require_once('db_login.php');
        $sum_qty = 0;
        $sum_price = 0;
        $qty=$id;
        if(isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $id => $qty){
                $query = "SELECT * FROM books WHERE isbn ='".$id."'";
                $result = $db->query($query);
                if (!$result){
                    die ("Could not connect to the database: <b />". $db->error. "<br>Query:".$query);
                }
                while ($row = $result->fetch_object()){
                    echo'<tr>';
                    echo'<td>'.$row->isbn.'</td>';
                    echo'<td>'.$row->author.'</td>';
                    echo'<td>'.$row->title.'</td>';
                    echo'<td>'.$row->price.'</td>';
                    echo'<td>'.$qty.'</td>';
                    $price = $row->price;
                    echo'<td>' .$row->price * $qty.'</td>';
                    $sum_qty = $sum_qty+$qty;
                    $sum_price = $sum_price + ($row->price * $qty);
                }
            }
            echo'<tr><td></td><td></td><td></td><td></td><td>'.$sum_qty.'</td><td>'.$sum_price.'</td></tr>';
            $result->free();
            $db->close();
        }else{
            echo '<tr><td colspan="6" align="center">There is no item in shopping cart</td></tr>';
        }
        ?>
       </table>
        Total items =  <?php echo $sum_qty; ?><br><br>
        <a class="btn btn-primary" href="view_books.php">Continue Shopping</a>
        <a class="btn btn-danger" href="delete_cart.php">Empty Cart</a><br /><br />
        </div>
        </div>
    </body>
</html>