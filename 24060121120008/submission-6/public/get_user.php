<?php
// Nama : Tiara Fitra Ramadhani Siregar
// Nim  : 24060121120008
// lab  : PBP A2

require_once '../lib/db_login.php';

/* TODO 7: Mengambil data user dari tabel 'tb_user' dengan parameter email */
if (isset($_GET['email'])) {
    $email = test_input($_GET['email']);
    $query = "SELECT * FROM tb_user WHERE email = '$email'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        echo "true"; // Email sudah terdaftar
    } else {
        echo "false"; // Email tersedia
    }
}
?>
