<!-- 
Nama : Duma Mora Arta Sitorus
NIM  : 24060121120004
Lab  : A2
-->

<?php
//File      : edit_customer.php
//Deskripsi : Menampilkan form edit data customer dan mengupdate data ke database

require_once('lib/db_login.php');
$id = $_GET['id']; //mendapatkan customerid yang dilewati ke url

// mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])) {
    $query = " SELECT * FROM customers WHERE customerid =".$id." ";
    //Execute the query
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />".$db->error);
    }else{
        while ($row = $result->fetch_object()) {
            $name = $row->name;
            $address = $row->address;
            $city=$row->city;
        }
    }
} else {
    $valid = TRUE;
    $name = test_input($_POST['name']);

    // Validasi terhadap field name
    if ($name == '') {
        $error_name = "Name is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }

    // Validasi terhadap field address
    $address = test_input($_POST['address']);
    if ($address == '') {
        $error_address = "Address is required";
        $valid = FALSE;
    }

    // Validasi terhadap field city
    $city = $_POST['city'];
    if ($city == '' || $city == 'none') {
        $error_city = "City is required";
        $valid = FALSE;
    }

    // Update data into database
    if ($valid) {
        $address = $db->real_escape_string($address);
        // TODO 4: Jika valid, update data pada database dengan mengeksekusi query yang sesuai
        //Assign a query
        $query = " UPDATE customers 
                   SET name='".$name."', address='".$address."',city='".$city."'
                   WHERE customerid=".$id."";
        //execute the query
        $result = $db->query($query);
        if (!$result) {
            die("Could not query the database: <br />". $db->error. '<br>Quer:' .$query);
        } else {
            $db->close();
            header('Location: view_customer.php');
        }
    }
}

?>
<?php include('./header.php') ?>
<br>
<div class="card mt-4">
    <div class="card-header">Edit Customers Data</div>
    <div class="card-body">
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $id ?>" method="POST" autocomplete="on">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $name; ?>">
                <div class="error"><?php if (isset($error_name)) echo $error_name ?></div>
            </div>
            <br />
            <div class="form-group">
                <label for="name">Address:</label>
                <textarea class="form-control" name="address" id="address" rows="5"><?php echo $address; ?></textarea>
                <div class="error"><?php if (isset($error_address)) echo $error_address ?></div>
            </div>
            <br />
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" value="<?= $city; ?>">
                <div class="error"><?php if (isset($error_city)) echo $error_city ?></div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php include('./footer.php') ?>
<?php
$db->close();
?>