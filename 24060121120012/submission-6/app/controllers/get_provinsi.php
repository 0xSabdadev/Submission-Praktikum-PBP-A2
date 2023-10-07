<?php
/*
Nama : Emerio Kevin Aryaputra
NIM : 24060121120012
Lab : PBP A2
*/

require_once('../models/db_login.php');

$query = "SELECT * FROM tb_provs";
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br/>" . $db->error);
} else {
    while ($row = $result->fetch_object()) {
        $kode_prov = $row->kode_prov;
        $nama_prov = $row->nama_prov;

        echo "<option value='" . $kode_prov . "'>" . $nama_prov . "</option>";
    }
}
