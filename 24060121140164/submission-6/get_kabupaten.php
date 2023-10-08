<?php
// NAMA : Zenobia Wirandi Zenaide
// NIM : 24060121140164
// Lab : PBP A2
require_once 'lib/db_login.php';
if (isset($_GET['kode_prov'])) {
    $kode_prov = $_GET['kode_prov'];
    $query = "SELECT * FROM tb_kabs WHERE kode_kab LIKE '$kode_prov%'";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br/>" . $db->error);
    } else {
        while ($row = $result->fetch_object()) {
            echo "<option value='" . $row->kode_kab . "'>" . $row->nama_kab . "</option>";
        }
    }
} else {
    echo "Anda belum memilih provinsi";
}
?>