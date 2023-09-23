<?php
// Include our login information
require_once('./lib/db_login.php');

// Inisialisasi variabel untuk menyimpan pesan kesalahan
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirimkan melalui formulir
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    // Validasi data
    if (empty($name)) {
        $errors[] = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z]*$/", $name)) {
        $errors[] = "Name should contain only letters and white space";
    }

    if (empty($address)) {
        $errors[] = "Address is required";
    }

    if (empty($city) || $city === 'none') {
        $errors[] = "City is required";
    }

    // Jika tidak ada kesalahan, masukkan data pelanggan ke database
    if (empty($errors)) {
        $name = $db->real_escape_string($name);
        $address = $db->real_escape_string($address);
        $city = $db->real_escape_string($city);

        $query = "INSERT INTO customers (name, address, city) VALUES ('$name', '$address', '$city')";
        $result = $db->query($query);

        if ($result) {
            // Data pelanggan berhasil ditambahkan
            header('Location: view_customer.php');
            exit;
        } else {
            $errors[] = "Failed to add new customer: " . $db->error;
        }
    }
}

// Tutup koneksi
$db->close();
?>

<?php include('./header.php'); ?>
<div class="card mt-5">
    <div class="card-header">Add New Customer</div>
    <div class="card-body">
        <?php
        // Tampilkan pesan kesalahan jika ada
        if (!empty($errors)) {
            echo '<div class="alert alert-danger" role="alert">';
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
            echo '</div>';
        }
        ?>

        <!-- Formulir untuk menambahkan pelanggan -->
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <select name="city" id="city" class="form-control" required>
                    <option value="none" <?php if (!isset($city)) echo 'selected' ?>>--Select a city--</option>
                    <option value="Airport West" <?php if (isset($city) && $city == "Airport West") echo 'selected' ?>>Airport West</option>
                    <option value="Box Hill" <?php if (isset($city) && $city == "Box Hill") echo 'selected' ?>>Box Hill</option>
                    <option value="Yarraville" <?php if (isset($city) && $city == "Yarraville") echo 'selected' ?>>Yarraville</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" href="view_customer.php">Add Customer</button>
        </form>
    </div>
</div>

<?php include('./footer.php'); ?>
