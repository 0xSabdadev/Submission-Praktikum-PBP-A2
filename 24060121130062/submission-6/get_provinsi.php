<?php
// Nama : Varrel
// Nim  : 24060121130062
// lab  : A2

require_once './db_login.php';

$query = "SELECT * FROM tb_provs";
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br/>" . $db->error);
} else {
    while ($row = $result->fetch_object()) {
        echo "<option value='" . $row->kode_prov . "'>" . $row->nama_prov . "</option>";
    }
}