<?php
// TODO 1: Lakukan koneksi dengan database
require_once('./lib/db_login.php');

// TODO 2: Ambil ID customer yang akan dihapus dari query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // TODO 3: Buat query DELETE untuk menghapus data customer berdasarkan ID
    $query = "DELETE FROM customers WHERE customerid = $id";

    // TODO 4: Eksekusi query DELETE
    $result = $db->query($query);

    if ($result) {
        // TODO 5: Redirect kembali ke halaman view_customer.php jika berhasil
        header('Location: view_customer.php');
        exit;
    } else {
        // TODO 6: Tampilkan pesan kesalahan jika gagal
        echo "Failed to delete customer: " . $db->error;
    }
}

// TODO 7: Tutup koneksi
$db->close();
?>
