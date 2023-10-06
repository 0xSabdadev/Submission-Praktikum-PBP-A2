<?php
require_once('db_login.php');

// TODO 1: Ambil value dari query string parameter id
if (isset($_GET['id'])) {
    $customer_id = intval($_GET['id']); // Pastikan parameter id adalah integer
} else {
    die("Parameter id tidak ditemukan.");
}

// TODO 2: Tuliskan dan eksekusi query untuk mendapatkan informasi customer
$query = "SELECT * FROM customers WHERE customerid = ?";
$stmt = $db->prepare($query);

if ($stmt) {
    // Bind parameter
    $stmt->bind_param("i", $customer_id);

    // Eksekusi pernyataan
    $stmt->execute();

    // Ambil hasil
    $result = $stmt->get_result();

    // TODO 3: Tuliskan response
    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
        // Tampilkan data pelanggan sesuai kebutuhan (misalnya, dengan echo)
        echo "Nama: " . $customer['name'] . "<br>";
        echo "Alamat: " . $customer['address'] . "<br>";
        echo "Kota: " . $customer['city'] . "<br>";
    } else {
        echo "Data pelanggan tidak ditemukan.";
    }

    // TODO 4: Dealokasi variabel dan tutup koneksi database
    $result->close();
    $stmt->close();
} else {
    die("Gagal menyiapkan pernyataan SQL: " . $db->error);
}

// Tutup Koneksi ke Database
$db->close();
?>