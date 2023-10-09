<?php
require_once('db_login.php');

// Periksa apakah data yang diperlukan (name, address, city) telah dikirimkan melalui POST
if (isset($_POST['name'], $_POST['address'], $_POST['city'])) {
    // Hindari SQL injection dengan menggunakan real_escape_string
    $name = $db->real_escape_string($_POST['name']);
    $address = $db->real_escape_string($_POST['address']);
    $city = $db->real_escape_string($_POST['city']);

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
            Name: ' . $_POST['name'] . '<br>
            Address: ' . $_POST['address'] . '<br>
            City:' . $_POST['city'] . '<br> </div>';
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
    // Pesan error jika data yang diperlukan tidak ada
    echo '<div class="alert alert-danger alert-dismissible">
    <strong>Error!</strong> Data yang diperlukan tidak ada</div>';
}

// Tutup Koneksi ke Database
$db->close();
?>