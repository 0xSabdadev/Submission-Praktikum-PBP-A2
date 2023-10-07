<?php
// Nama : Divia Shinta Sukarsaatmadja
// Nim  : 24060121140104
// lab  : A2

require_once 'lib/db_login.php';

/* TODO 7 : mengambil data user dari tabel 'tb_user' dengan paramater email */
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['email'])) {
    $email = $_GET['email'];

    if ($email === '') {
        echo "<span style='color: red;'>Email harus diisi</span>";
        exit(); 
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || preg_match('/[\/?<>[\];=-]/', $email)) {
        echo "<span style='color: red;'>Email tidak valid</span>";
    } else {
        $query = "SELECT * FROM tb_user WHERE email='$email'";
        $result = $db->query($query);

        if ($result && $result->num_rows > 0) {
            echo "<span style='color: red;'>Email telah digunakan</span>";
        } else {
            echo "<span style='color: green;'>Email tersedia</span>";
        }
    }
}
?>
