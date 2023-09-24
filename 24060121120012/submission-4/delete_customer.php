<?php
/*
Nama         : Emerio Kevin Aryaputra
NIM          : 24060121120012
Lab          : PBP A2
File         : delete_customer.php
Deskripsi    : Menampilkan form konfirmasi delete customer dan menghapus data dari database.
*/

require_once('./lib/db_login.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT name, address, city
                FROM customers
                WHERE customerid = '" . $id . "'
            ";

    $result = $db->query($query);
    if (!$result) {
        die('Could not query the database: <br/>' . $db->error);
    }

    if ($result->num_rows == 1) {
        $customer = $result->fetch_object();
    } else {
        die('Customer not found');
    }
}

if (isset($_POST['delete'])) {
    $query = "DELETE FROM customers WHERE customerid = '" . $id . "'";
    $result = $db->query($query);

    if ($result) {
        $db->close();
        header('Location: view_customer.php');
    } else {
        die('Error deleting book :' . $db->error);
    }
}
?>

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

include('./header.php') ?>
<div class="card mt-4">
    <div class="card-header">Confirm Customer Delete</div>
    <div class="card-body">
        <h4>Are you sure you want to delete this customer?</h4>
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name" name="name" disabled value="<?= $customer->name ?>">
        </div>
        <div class="form-group">
            <label for="name">Address:</label>
            <textarea class="form-control" name="address" id="address" disabled rows="5"><?php echo $customer->address ?></textarea>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" disabled value="<?= $customer->city ?>">
        </div>
        <form class="mt-4" action="<?= $_SERVER['PHP_SELF'] . '?id=' . $id ?>" method="post">
            <button type="submit" class="btn btn-danger" name="delete">Delete</button>
            <a class="btn btn-secondary" href="view_customer.php">Cancel</a>
        </form>
    </div>
</div>
<?php include('./footer.php') ?>