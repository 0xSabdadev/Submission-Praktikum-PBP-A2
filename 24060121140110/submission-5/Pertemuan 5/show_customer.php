<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : menampilkan data customers
 -->

<?php include('header.html') ?>
<br>
<div class="container">
    <div class="card">
        <div class="card-header" style="text-align:center">Show Customers Data</div>
        <div class="card-body">
            <select name="customer" id="customer" class="form-control" onchange="showCustomer(this.value)">
                <option value="">--Select a Customer--</option>
                <?php
                require_once('db_login.php');
                // mengambil data dari database berdasarkan id customer
                $query = " SELECT * FROM customers ORDER BY customerid ";
                $result = $db->query($query);
                if (!$result) { // jika query gagal dieksekusi
                    die("Could not query the database: <br />" . $db->error);
                }
                // iterasi hasil query untuk mengambil data customers
                while ($row = $result->fetch_object()) {
                    echo '<option value="' . $row->customerid . '">' . $row->name . '</option>'; 
                }    // menampilkan data customers dalam bentuk option
                
                // dealokasi memory
                $result->free();
                $db->close();
                ?>
            </select>
            <br>
            <div id="detail_customer"></div>
        </div>
    </div>
</div>
<?php include('footer.html') ?>
<script src="ajax.js"></script> 