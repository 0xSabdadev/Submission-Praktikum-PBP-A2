<!-- 
File      : view_customer2.php		22/09/23
Penulis   : Varrel / 24060121130062
Deskripsi : Halaman yang menampilkan data customer - menggunakanquery yang berbeda
-->

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

include('./header.php') ?>


<div class="card mt-5">
    <div class="card-header">Customers Data</div>
    <div class="card-body">
        <a href="add_customer.php" class="btn btn-primary mb-4">+ Add Customer Data</a>
        <a href="logout.php" class="btn btn-danger mb-4">Logout</a>
        <br>
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Action</th>
            </tr>
            <?php
            // TODO 1: Buat koneksi dengan database
            require_once('./lib/db_login.php');

            // TODO 2: Tulis dan eksekusi query ke database
            $query = "SELECT customerid AS ID, name AS Nama, address AS Alamat, city AS Kota FROM customers ORDER BY customerid";
            $result = $db->query($query);
            if (!$result) {
                die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
            }


            // TODO 3: Parsing data yang diterima dari database ke halaman HTML/PHP
            $i = 1;
            while ($row = $result->fetch_object()) {
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $row->Nama . '</td>';
                echo '<td>' . $row->Alamat . '</td>';
                echo '<td>' . $row->Kota . '</td>';
                echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id=' . $row->ID . '">Edit</a>&nbsp;<a class="btn btn-danger btn-sm" href="delete_customer.php?id=' . $row->ID . '">Delete</a></td>';
                echo '</tr>';
                $i++;
            }

            // TODO 4: Lakukan dealokasi variabel $result
            echo '</table>';
            echo '<br />';
            echo 'Total Rows = ' . $result->num_rows;

            // TODO 5: Tutup koneksi dengan database
            $result->free();
            $db->close();

            ?>
    </div>
</div>
<?php include('./footer.php') ?>