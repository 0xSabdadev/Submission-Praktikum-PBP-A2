<?php include('./header.php') ?>
<div class="card mt-5">
    <div class="card-header">Books Data</div>
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php
            // Include our login information
            require_once('./lib/db_login.php');

            // TODO 1: Tuliskan dan eksekusi query
            $query = " SELECT * FROM books ORDER BY isbn ";
            $result = $db->query($query);
            if(!$result){
                die("Could not query the database: <br />".$db->error."<br>Query: ".$query);
            }

            //Fetch adn display the results
                while($row = $result->fetch_object()){
                    echo '<tr>';
                    echo '<td>'.$row->isbn.'</td>';
                    echo '<td>'.$row->author.'</td>';
                    echo '<td>'.$row->title.'</td>';
                    echo '<td>'.$row->price.'</td>';
                    echo '<td><a class="btn btn-primary btn-sm" href="show_cart.php?id='.$row->isbn.'">Add to Cart</a>
                    </td>';
                    echo '</tr>';
                }  
                echo '</table>';
                echo '<br>' ;

            // TODO 4: Lakukan dealokasi variabel $result
                echo 'Total Rows = '.$result->num_rows;
            // TODO 5: Tutup koneksi dengan database
                $result -> free();
                $db-> close();

            ?>
    </div>
</div>
<?php include('./footer.php') ?>

