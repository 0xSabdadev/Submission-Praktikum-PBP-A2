<?php
// NAMA : Zenobia Wirandi Zenaide
// NIM : 24060121140164
// Lab : PBP A2

require_once 'lib/db_login.php';
$query = "SELECT * FROM tb_provs";
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br/>" . $db->error);
} else {
    while ($row = $result->fetch_object()) {
        echo "<option value='" . $row->kode_prov . "'>" . $row->nama_prov . "</option>";
    }
}
