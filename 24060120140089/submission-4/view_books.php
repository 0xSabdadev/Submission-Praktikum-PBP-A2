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
        <div class="card">
        <div class="card-header">Books Data</div>
        <div class="card-body">
        <br>
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
                <th>Action</th>
            </tr>

        <?php
        // include our login information
        require_once('db_login.php');
        //execute the query
        $query = "SELECT * FROM books ";
        $result = $db->query($query);
        if (!$result){
            die ("Could not connect to the database: <b />". $db->error. "<br>Query:".$query);
        }
        //fetch and display the result
        while ($row = $result->fetch_object()){
            echo'<tr>';
            echo'<td>'.$row->isbn.'</td>';
            echo'<td>'.$row->author.'</td>';
            echo'<td>'.$row->title.'</td>';
            echo'<td>'.$row->price.'</td>';
            echo'<td><a class="btn btn-primary" href="show_cart.php?id='.$row->isbn.'">Add to Cart</a></td>';
            echo'</tr>';
        }
        echo '</table>';
        echo '<br />';
        echo 'Total Rows ='.$result->num_rows;
        $result->free();
        $db->close();
        ?>
        </table>
        </div>
        </div>
    </body>
</html>