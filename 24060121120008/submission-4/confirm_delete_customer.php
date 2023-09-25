<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 25 September 2023
     Lab        : PBP A2
 -->
 
<?php
// TODO 1: Lakukan koneksi dengan database
require_once('./lib/db_login.php');

// Pemeriksaan apakah "id" ada dalam query string
if (isset($_GET['id'])) {
    $custid = test_input($_GET['id']); // Mendapatkan Customer ID dari query string

    // TODO 2: Tulis dan eksekusi query untuk mengambil informasi customer berdasarkan Customer ID
    $query = "SELECT * FROM customers WHERE customerid='" . $custid . "'";
    $result = $db->query($query);

    if (!$result) {
        die("Could not query the database: <br />" . $db->error);
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $address = $row['address'];
        $city = $row['city'];
    } else {
        // Customer ID tidak valid, tampilkan pesan kesalahan
        echo "Invalid Customer ID.";
        exit();
    }

    // TODO 3: Handle konfirmasi penghapusan
    if (isset($_POST['confirm'])) {
        // Hapus customer dari database
        $delete_query = "DELETE FROM customers WHERE customerid='" . $custid . "'";
        $delete_result = $db->query($delete_query);

        if (!$delete_result) {
            die("Could not delete customer's data: <br />" . $db->error);
        } else {
            // Redirect kembali ke halaman CRUD setelah penghapusan berhasil
            header('Location: view_customer2.php');
        }
    } elseif (isset($_POST['cancel'])) {
        // Redirect kembali ke halaman CRUD jika pengguna membatalkan penghapusan
        header('Location: view_customer2.php');
    }
}
?>

<?php include('./header.php'); ?>
<div class="card mt-5">
    <div class="card-header">Confirm Delete Customer</div>
    <div class="card-body">
        <p>Are you sure you want to delete the following customer data?</p>
        <table class="table">
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
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $custid; ?>" method="POST">
            <button type="submit" class="btn btn-danger" name="confirm">Confirm Delete</button>
            <button type="submit" class="btn btn-secondary" name="cancel">Cancel</button>
        </form>
    </div>
</div>
<?php include('./footer.php') ?>
