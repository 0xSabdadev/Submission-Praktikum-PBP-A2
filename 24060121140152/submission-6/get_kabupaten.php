<?php
// Nama : Adri Audifirst
// Nim  : 24060121140152
// lab  : A2

require_once 'lib/db_login.php';

/* TODO 6 : mengambil data kabupaten dari tabel 'tb_kabs' dengan parameter kode_prov*/
$kode_prov = $_GET['kode_prov'];
$query = "SELECT * FROM tb_kabs WHERE kode_prov = $kode_prov";
$result = $db->query($query);

if (!$result) {
    die("Failed to query the database: <br/>" . $db->error);
} else {
    echo "<option disabled selected value=''>Pilih Kabupaten</option>";
    while ($row = $result->fetch_object()) {
        echo "<option value='" . $row->kode_kab . "'>" . $row->nama_kab . "</option>";
    }
}
