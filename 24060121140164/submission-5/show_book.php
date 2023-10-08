<style>
    body {
        background-image: url('./images/perpustakaan.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>

<?php include('./header.php') ?>
<div class="row w-50 mx-auto mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header">Search Book Data</div>
            <div class="card-body">
                <input type="text" name="book" id="book" class="form-control" placeholder="Enter Book Title Here ..." oninput="showBook(this.value)">
                <?php
                require_once('./lib/db_login.php');

                $query = "SELECT * FROM books ORDER BY isbn";
                $result = $db->query($query);

                if (!$result) {
                    die("Could not query the database: <br>" . $db->error);
                }

                $result->free();
                $db->close();
                ?>
                <br>
                <div id="detail_book"></div>
            </div>
        </div>
    </div>
</div>
<?php include('./footer.php') ?>