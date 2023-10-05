<?php
// Nama : Sheva Ivanda Pratama
// Nim  : 24060120140089
// lab  : A2

require_once 'lib/db_login.php';

/* TODO 7 : mengambil data user dari tabel 'tb_user' dengan paramater email */
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $query = "SELECT * FROM tb_user WHERE email = '$email'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "0"; // email exists
    }else {
        echo "1"; // email doesn't exists
    return;
    }
} else {
    echo "Tidak ada data email yang dikirim.";
}

mysqli_close($db);
?>