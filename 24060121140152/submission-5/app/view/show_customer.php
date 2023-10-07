<!-- 
    File: show_customer.php
    Nama: Adri Audifirst
    NIM: 24060121140152
    Date: 3 September 2023
    Deskripsi: Menampilkan data pelanggan
 -->
<?php include('../../components/header.php') ?>
<div class="row w-50 mx-auto mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header">Show Customer</div>
            <div class="card-body">
                <select name="customer" id="customer" class="form-select" onchange="showCustomer(this.value)">
                    <option value="">--Pilih Customer--</option>
                    <?php
                    require_once('../lib/db_login.php');

                    // Asign A Query
                    $query = "SELECT * FROM customers ORDER BY customerid";
                    $result = $db->query($query);

                    if (!$result) {
                        die("Could not query the database: <br>" . $db->error);
                    }

                    while ($row = $result->fetch_object()) {
                        echo '<option value="' . $row->customerid . '">' . $row->name . '</option>';
                    }

                    $result->free();
                    $db->close();
                    ?>
                </select>
                <br>
                <div id="detail_customer"></div>
                <a href="../../index.php" class="btn btn-secondary mt-4">Back</a>
            </div>
        </div>
    </div>
</div>
<?php include('../../components/footer.php') ?>