<?php
// Nama : Duma Mora Arta Sitorus
// Nim  : 2406012112004
// lab  : A1
/* TODO 6 : mengambil data kabupaten dari tabel 'tb_kabs' dengan parameter kode_prov*/

    require_once ('../lib/db_login.php');
    if (isset($_GET['kode_prov'])) {
        $kodeProvinsi = $_GET['kode_prov'];

        $query = "SELECT * FROM tb_kabs WHERE kode_prov = '$kodeProvinsi'";
        $result = $db->query($query);
        echo "<option value='-'>".'Pilih Kabupaten'."</option>";

        if (!$result) {
            die("Could not query the database: <br/>" . $db->error);
        } else {
            while ($row = $result->fetch_object()) {
                echo "<option value='" . $row->kode_kab . "'>" . $row->nama_kab . "</option>";
            }
        }
    }
?>


