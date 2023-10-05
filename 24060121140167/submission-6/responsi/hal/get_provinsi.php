<?php
// Agung Surya Permana
// 24060121140167
require_once 'lib/db_login.php';

// Mengambil data dari tabel tb_provs
$query = "SELECT * FROM tb_provs";
$result = $db->query($query);

// Mencetak tidak adanya query di db / menampilkan data
if (!$result) {
    die("Could not query the database: <br/>" . $db->error);
} else {
    while ($row = $result->fetch_object()) {
        echo "<option value='" . $row->kode_prov . "'>" . $row->nama_prov . "</option>";
    }
}
