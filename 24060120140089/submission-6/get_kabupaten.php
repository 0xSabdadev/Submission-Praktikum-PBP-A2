<?php
// Nama : Sheva Ivanda Pratama
// Nim  : 24060120140089
// lab  : A2


/* TODO 6 : mengambil data kabupaten dari tabel 'tb_kabs' dengan parameter kode_prov*/
require_once('lib/db_login.php');
if (isset($_POST['kode_prov'])) {
    $kode_prov = $_POST['kode_prov'];
    // Assign query
    $query = "SELECT * FROM tb_kabs WHERE kode_prov='$kode_prov'";

    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br/ >" . $db->error);
    } else {
        while ($row = $result->fetch_object()) {
            echo "<option value='" . $row->kode_kab . "'>" . $row->nama_kab . "</option>";
        }
    }


    // Fetch and display the result
} else {
    echo "<option selected value=''>Pilih Kabupaten</option>";   
}
// $result->free();
// $db->close();
