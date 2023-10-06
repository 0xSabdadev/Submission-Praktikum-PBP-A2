<?php
require_once('db_login.php');

// Periksa apakah parameter yang diperlukan (name, address, city) telah diatur
if (isset($_GET['name'], $_GET['address'], $_GET['city'])) {
    $name = $_GET['name'];
    $address = $_GET['address'];
    $city = $_GET['city'];

    // Buat pernyataan yang telah dipersiapkan (prepared statement)
    $query = "INSERT INTO customers (name, address, city) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);

    if ($stmt) {
        // Bind parameter-parameter
        $stmt->bind_param("sss", $name, $address, $city);

        // Jalankan pernyataan
        if ($stmt->execute()) {
            // Pesan sukses
            echo '<div class="alert alert-success alert-dismissible">
            <strong>Success!</strong> Data has been added. <br>
            Name: ' . $_GET['name'] . '<br>
            Address: ' . $_GET['address'] . '<br>
            City:' . $_GET['city'] . '<br> </div>';
        } else {
            // Pesan error jika eksekusi gagal
            echo '<div class="alert alert-danger alert-dismissible">
            <strong>Error!</strong> Could Not Query the Database<br>' . $stmt->error . '</div>';
        }

        // Tutup pernyataan
        $stmt->close();
    } else {
        // Pesan error jika pernyataan tidak dapat disiapkan
        echo '<div class="alert alert-danger alert-dismissible">
        <strong>Error!</strong> Could Not Prepare Statement<br>' . $db->error . '</div>';
    }
} else {
    // Pesan error untuk parameter yang hilang
    echo '<div class="alert alert-danger alert-dismissible">
    <strong>Error!</strong> Parameter yang diperlukan tidak ada</div>';
}

// Tutup Koneksi ke Database
$db->close();
?>