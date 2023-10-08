<?php
// Nama : Nida' Naafilatul Haniifah
// Nim  : 24060121120039
// lab  : A2

require_once 'db_login.php';

$kode_prov = $_GET['id'];
$query = "SELECT * FROM tb_kabs WHERE kode_prov =".$kode_prov;
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br/>" . $db->error);
} else {
    while ($row = $result->fetch_object()) {
        echo "<option value='" . $row->kode_kab . "'>" . $row->nama_kab . "</option>";
    }
}
?>