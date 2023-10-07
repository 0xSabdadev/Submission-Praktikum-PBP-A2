<?php
/*
Nama : Emerio Kevin Aryaputra
NIM : 24060121120012
Lab : PBP A2
*/

require_once('../models/db_login.php');

$kode_prov = $_GET['kode_prov'];
$query = "SELECT * FROM tb_kabs WHERE kode_prov='$kode_prov'";
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br/>" . $db->error);
} else {
    echo '<option value="" selected disabled>-- Pilih Kabupaten --</option>';
    while ($row = $result->fetch_object()) {
        $kode_kab = $row->kode_kab;
        $nama_kab = $row->nama_kab;

        echo "<option value='" . $kode_kab . "'>" . $nama_kab . "</option>";
    }
}
