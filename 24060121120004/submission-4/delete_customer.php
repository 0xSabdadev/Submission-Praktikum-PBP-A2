<!-- 
Nama : Duma Mora Arta Sitorus
NIM  : 24060121120004
Lab  : A2
-->

<?php
// TODO 1: Lakukan koneksi dengan database
require_once('./lib/db_login.php');

if (isset($_GET['id'])) {
    $customerid = test_input($_GET['id']); // Mendapatkan id customer dari query string

    // TODO 2: Tulis dan eksekusi query untuk mengambil informasi buku berdasarkan ISBN
    $query = "SELECT * FROM customers WHERE customerid='" . $customerid . "' ";
    $result = $db->query($query);

    if (!$result) {
        die("Could not query the database: <br />" . $db->error);
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $customerid = $row['customerid'];
        $name = $row['name'];
        $address = $row['address'];
        $city = $row['city'];
    } else {
        // ISBN tidak valid, tampilkan pesan kesalahan
        echo "Invalid customer ID.";
        exit();
    }

    // TODO 3: Handle konfirmasi penghapusan
    if (isset($_POST['confirm'])) {
        // Hapus buku dari database
        $delete_query = "DELETE FROM customers WHERE customerid='" . $customerid . "'";
        $delete_result = $db->query($delete_query);

        if (!$delete_result) {
            die("Could not delete the book: <br />" . $db->error);
        } else {
            // Redirect kembali ke halaman CRUD setelah penghapusan berhasil
            header('Location: view_customer.php');
        }
    } elseif (isset($_POST['cancel'])) {
        // Redirect kembali ke halaman CRUD jika pengguna membatalkan penghapusan
        header('Location: view_customer.php');
    }
}
?>

<?php include('./header.php'); ?>
<div class="card mt-5">
    <div class="card-header">Confirm Delete Customer Data</div>
    <div class="card-body">
        <p>Are you sure you want to delete the following customer data?</p>
        <table class="table">
            <tr>
                <th>ID Costumer</th>
                <td><?= $customerid; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?= $name; ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?= $address; ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?= $city; ?></td>
            </tr>
        </table>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $customerid; ?>" method="POST">
            <button type="submit" class="btn btn-danger" name="confirm">Confirm Delete</button>
            <button type="submit" class="btn btn-secondary" name="cancel">Cancel</button>
        </form>
    </div>
</div>
<?php include('./footer.php'); ?>
