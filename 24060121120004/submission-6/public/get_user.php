<?php
// Nama : Duma Mora Arta Sitorus
// Nim  : 2406012112004
// lab  : A1

require_once 'lib/db_login.php';

/* TODO 7 : mengambil data user dari tabel 'tb_user' dengan paramater email */
    $email = $_GET['email'];
    $query = "SELECT * FROM tb_user WHERE email = '$email'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        // Jika email sudah ada di database, kirim pesan kesalahan
        echo '<span class="text-red-600">*Email sudah digunakan</span>';
    } else {
        // Jika email belum ada di database, tidak perlu tindakan khusus
        // Anda bisa mengembalikan pesan kosong atau apapun yang sesuai
        echo '';
    }

    // Tutup koneksi database
    $db->close();
?>