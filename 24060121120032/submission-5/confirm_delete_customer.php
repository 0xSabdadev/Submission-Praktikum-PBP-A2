<?php
// TODO: Lakukan koneksi dengan database
require_once('lib/db_login.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // TODO: Tulis dan eksekusi query untuk menghapus pelanggan berdasarkan id
    $query = "DELETE FROM customers WHERE customerid = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect ke halaman view_customer.php setelah berhasil menghapus pelanggan
        $stmt->close();
        $db->close();
        header('Location: view_customer2.php');
        exit;
    } else {
        die("Could not delete customer from the database: " . $stmt->error);
    }
}
?>
