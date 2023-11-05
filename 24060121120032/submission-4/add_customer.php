<?php
// TODO 1: Lakukan koneksi dengan database
require_once('lib/db_login.php');

// Inisialisasi variabel
$name = '';
$address = '';
$city = '';
$error_name = '';
$error_address = '';
$error_city = '';
$valid = true;

// Memeriksa apakah formulir sudah disubmit
if (isset($_POST["submit"])) {
    // Validasi data input
    $name = test_input($_POST['name']);
    if (empty($name)) {
        $error_name = "Name is required";
        $valid = false;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = false;
    }

    $address = test_input($_POST['address']);
    if (empty($address)) {
        $error_address = "Address is required";
        $valid = false;
    }

    $city = $_POST['city'];
    if (empty($city) || $city == 'none') {
        $error_city = "City is required";
        $valid = false;
    }

    // Jika data valid, tambahkan pelanggan baru ke database
    if ($valid) {
        // Menghindari SQL Injection dengan menggunakan prepared statement
        $query = "INSERT INTO customers (name, address, city) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("sss", $name, $address, $city);
        
        if ($stmt->execute()) {
            // Redirect ke halaman view_customer.php setelah berhasil menambahkan pelanggan
            $stmt->close();
            $db->close();
            header('Location: view_customer.php');
            exit;
        } else {
            die("Could not insert customer into the database: " . $stmt->error);
        }
    }
}
?>

<?php include('header.php') ?>
<br>
<div class="card mt-4">
    <div class="card-header">Add Customer</div>
    <div class="card-body">
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" autocomplete="on">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $name; ?>">
                <div class="error"><?php if (isset($error_name)) echo $error_name ?></div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address" id="address" rows="5"><?= $address; ?></textarea>
                <div class="error"><?php if (isset($error_address)) echo $error_address ?></div>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select name="city" id="city" class="form-control" required>
                    <option value="none" <?php if (!isset($city) || $city == 'none') echo 'selected' ?>>--Select a city--</option>
                    <option value="Airport West" <?php if (isset($city) && $city == "Airport West") echo 'selected' ?>>Airport West</option>
                    <option value="Box Hill" <?php if (isset($city) && $city == "Box Hill") echo 'selected' ?>>Box Hill</option>
                    <option value="Yarraville" <?php if (isset($city) && $city == "Yarraville") echo 'selected' ?>>Yarraville</option>
                </select>
                <div class="error"><?php if (isset($error_city)) echo $error_city ?></div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Add Customer</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php include('footer.php') ?>
<?php
$db->close();
?>
