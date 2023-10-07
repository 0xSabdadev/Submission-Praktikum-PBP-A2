<?php
// Nama : Ardian Fajar Widyaputra
// Nim  : 24060121140116
// lab  : A2

require_once 'lib/db_login.php';

/* TODO 7 : mengambil data user dari tabel 'tb_user' dengan paramater email */

if (isset($_GET['email'])) {
    $email = test_input($_GET['email']);
    
    // Gunakan parameterized query untuk menghindari SQL injection
    $query = "SELECT * FROM tb_user WHERE email = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "true"; // Email sudah terdaftar
    } else {
        echo "false"; // Email tersedia
    }

    // Tutup statement
    $stmt->close();
}
?>