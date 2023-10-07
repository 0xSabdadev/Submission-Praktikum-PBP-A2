<?php
// Nama : Aprilyanto Setiyawan Siburian
// Nim  : 24060121120022
// lab  : A2

require_once 'lib/db_login.php';

/* TODO 6 : mengambil data kabupaten dari tabel 'tb_kabs' dengan parameter kode_prov*/
if (isset($_GET['kode_prov'])) {
    // Menghindari SQL Injection dengan mengamankan parameter
    $kode_prov = $db->real_escape_string($_GET['kode_prov']);

    /* TODO 6 : mengambil data kabupaten dari tabel 'tb_kabs' dengan parameter kode_prov*/
    $query = "SELECT * FROM tb_kabs WHERE kode_prov = '$kode_prov'";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br/>" . $db->error);
    } else {
        echo "<option disabled selected value=''>Pilih Kabupaten</option>";
        while ($row = $result->fetch_object()) {
            echo "<option value='" . $row->kode_kab . "'>" . $row->nama_kab . "</option>";
        }
    }
} else {
    echo "Parameter kode_prov tidak tersedia.";
}