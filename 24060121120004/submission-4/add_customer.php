<!-- 
Nama : Duma Mora Arta Sitorus
NIM  : 24060121120004
Lab  : A2
-->

<?php
// TODO 1: Lakukan koneksi dengan database
require_once('./lib/db_login.php');

// Variable untuk menyimpan data input pengguna
$customerid = $name = $address = $city="" ;
$error_customerid = $error_name = $error_address = $error_city = "";
$valid = true;

// TODO 2: Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi ID Customer
    $customerid = test_input($_POST['customerid']);
    if ($customerid == '') {
        $error_customerid = "ID Customer is required";
        $valid = false;
    } elseif (!preg_match("/^[0-9\-]*$/", $customerid)) {
        $error_customerid = "ID Customer should contain only digits and hyphens";
        $valid = false;
    }

    // Validasi Name
    $name = test_input($_POST['name']);
    if ($name == '') {
        $error_name = "name is required";
        $valid = false;
    } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $name)) {
        $error_name = "Only letters, numbers, and white space allowed";
        $valid = false;
    }

    // Validasi address
    $address = test_input($_POST['address']);
    if ($address == '') {
        $error_address = "address is required";
        $valid = false;
    } elseif (!preg_match("/^[a-zA-Z0-9,. ]*$/", $address)) {
        $error_address = "Only letters, commas, and periods are allowed";
        $valid = false;
    }

    // Validasi City
    $city = $_POST['city'];
    if ($city == '') {
        $error_city = "City is required";
        $valid = false;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $city)) {
        $error_city = "Only Letters are allowed";
        $valid = false;
    }

    // Jika data valid, tambahkan buku ke database
    if ($valid) {
        // TODO 3: Insert data buku ke dalam database
        $insert_query = "INSERT INTO customers (customerid, name, address, city) VALUES ('$customerid', '$name', '$address', '$city')";
        $insert_result = $db->query($insert_query);

        if (!$insert_result) {
            die("Could not insert book into the database: <br />" . $db->error);
        } else {
            // Redirect ke halaman CRUD setelah penambahan berhasil
            header('Location: view_books.php');
        }
    }
}
?>

<?php include('./header.php'); ?>
<div class="card mt-5">
    <div class="card-header">Add Customer Data</div>
    <div class="card-body">
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="on">
            <div class="form-group">
                <label for="customerid">Customer ID :</label>
                <input type="text" class="form-control" id="customerid" name="customerid" value="<?= $customerid; ?>">
                <div class="error"><?php if (isset($error_customerid)) echo $error_customerid; ?></div>
            </div>
            <div class="form-group">
                <label for="title">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $name; ?>">
                <div class="error"><?php if (isset($error_name)) echo $error_name; ?></div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= $address; ?>">
                <div class="error"><?php if (isset($error_address)) echo $error_address; ?></div>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" value="<?= $city; ?>">
                <div class="error"><?php if (isset($error_city)) echo $error_city; ?></div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Add Book</button>
        </form>
    </div>
</div>
<?php include('./footer.php'); ?>
