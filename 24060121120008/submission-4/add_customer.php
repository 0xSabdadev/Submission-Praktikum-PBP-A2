<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 25 September 2023
     Lab        : PBP A2
 -->
 
<?php
// TODO 1: Lakukan koneksi dengan database
require_once('./lib/db_login.php');

// Variable untuk menyimpan data input pengguna
$id = $name = $address = $city = "";
$error_id = $error_name = $error_address = $error_city = "";
$valid = true;

// TODO 2: Handle form submission
if (isset($_POST['submit'])) {
    // Validasi ISBN
    $id = test_input($_POST['id']);
    if ($id === '') {
        $error_id = "ID is required";
        $valid = false;
    } elseif (!is_numeric($id)) {
        $error_id = "ID should contain only digits";
        $valid = false;
    }
    
    // Validasi Title
    $name = test_input($_POST['name']);
    if ($name == '') {
        $error_name = "Name is required";
        $valid = false;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = false;
    }    

    // Validasi Author
    $address = test_input($_POST['address']);
    if($address ==''){
        $error_address = "Address is required";
        $valid = FALSE;
    } 

    // Validasi Category
    $city = $_POST['city'];
    if ($city == '' || $city == 'none') {
        $error_city = "City is required";
        $valid = false;
    }

    // Jika data valid, tambahkan buku ke database
    if ($valid) {
        // TODO 3: Insert data buku ke dalam database
        $insert_query = "INSERT INTO customers VALUES ('$id', '$name', '$address', '$city')";
        $insert_result = $db->query($insert_query);

        if (!$insert_result) {
            die("Could not insert customer into the database: <br />" . $db->error);
        } else {
            // Redirect ke halaman CRUD setelah penambahan berhasil
            header('Location: view_customer2.php');
        }
    }
    }elseif (isset($_POST['back'])) {
        // Redirect kembali ke halaman CRUD jika pengguna membatalkan penambahan review
        header('Location: view_customer2.php');
        $db->close();
        exit;
    }
?>

<?php include('./header.php'); ?>
<div class="card mt-5">
    <div class="card-header">Add Customers Data</div>
    <div class="card-body">
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="on">
            <div class="form-group">
                <label for="isbn">ID:</label>
                <input type="text" class="form-control" id="id" name="id" value="<?= $id; ?>">
                <div class="error"><?php if (isset($error_id)) echo $error_id; ?></div>
            </div>
            <div class="form-group">
                <label for="title">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $name; ?>">
                <div class="error"><?php if (isset($error_name)) echo $error_name; ?></div>
            </div>
            <div class="form-group">
                <label for="name">Address:</label>
                <textarea class="form-control" name="address" id="address" rows="3"><?php echo $address; ?></textarea>
                <div class="error"><?php if (isset($error_address)) echo $error_address ?></div>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select name="city" id="city" class="form-control" required>
                    <option value="none">--Select a city--</option>
                    <option value="Airport West" <?php if ($city == "Airport West") echo 'selected'; ?>>Airport West</option>
                    <option value="Box Hill" <?php if ($city == "Box Hill") echo 'selected'; ?>>Box Hill</option>
                    <option value="Yarraville" <?php if ($city== "Yarraville") echo 'selected'; ?>>Yarraville</option>
                </select>
                <div class="error"><?php if (isset($error_city)) echo $error_city; ?></div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Add Customer</button>
            <button type="submit" class="btn btn-secondary" name="back">Back</button>
        </form>
    </div>
</div>
<?php include('./footer.php') ?>

