<?php
require_once('./lib/db_login.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = TRUE;
    $name = test_input($_POST['name']);
    $address = test_input($_POST['address']);
    $city = $_POST['city'];

    if (empty($name)) {
        $error_name = "Name is required";
        $valid = FALSE;
    }
    if (empty($address)) {
        $error_address = "Address is required";
        $valid = FALSE;
    }
    if (empty($city) || $city == 'none') {
        $error_city = "City is required";
        $valid = FALSE;
    }

    if ($valid) {
        $address = $db->real_escape_string($address);

        $query = "INSERT INTO customers (name, address, city) VALUES ('$name', '$address', '$city')";
        $result = $db->query($query);

        if (!$result) {
            die("Could not insert data into the database: <br />" . $db->error . "<br>Query: " . $query);
        } else {
            $db->close();
            header('Location: view_customer.php');
        }
    }
}

include('./header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
</head>
<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">Add Customer Data</div>
            <div class="card-body">
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" autocomplete="on">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= isset($name) ? $name : ''; ?>">
                        <div class="error"><?php if (isset($error_name)) echo $error_name ?></div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" name="address" id="address" rows="5"><?= isset($address) ? $address : ''; ?></textarea>
                        <div class="error"><?php if (isset($error_address)) echo $error_address ?></div>
                    </div>
                    <div class="form-group">
                        <label for="city">City:</label>
                        <select name="city" id="city" class="form-control" required>
                            <option value="none" <?php if (!isset($city)) echo 'selected' ?>>--Select a city--</option>
                            <option value="Airport West" <?php if (isset($city) && $city == "Airport West") echo 'selected' ?>>Airport West</option>
                            <option value="Box Hill" <?php if (isset($city) && $city == "Box Hill") echo 'selected' ?>>Box Hill</option>
                            <option value="Yarraville" <?php if (isset($city) && $city == "Yarraville") echo 'selected' ?>>Yarraville</option>
                        </select>
                        <div class="error"><?php if (isset($error_city)) echo $error_city ?></div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php include('./footer.php'); ?>
