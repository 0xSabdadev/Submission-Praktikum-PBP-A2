<?php
// Nama : Athiya Puteri Hidayat
// Nim  : 24060121140128
// lab  : A2

require_once 'lib/db_login.php';

/* TODO 7 : mengambil data user dari tabel 'tb_user' dengan paramater email */
$db = new mysqli($db_host, $db_username, $db_password, $db_database);

if ($db->connect_errno) {
    die("Could not connect to the database: <br/>" . $db->connect_error);
}

$email = $_GET['email'];
$query = "SELECT * FROM tb_user WHERE email = '$email'";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" . $db->error);
} else {
    if ($result->num_rows > 0) {
        $row = $result->fetch_object();
        echo "Nama: " . $row['nama'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Jenis Kelamin: " . $row['jenis_kelamin'] . "<br>";
        echo "Alamat: " . $row['alamat'] . "<br>";
        echo "Kode Provinsi: " . $row['kode_prov'] . "<br>";
        echo "Kode Kabupaten: " . $row['kode_kab'] . "<br>";
    } else {
        echo "Could not find email '$email' user.";
    }
}

$db->close();