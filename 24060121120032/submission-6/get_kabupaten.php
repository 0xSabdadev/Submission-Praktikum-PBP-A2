<?php

// Nama : Elisabeth zefanya putri
// Nim  : 24060121120032
// lab  : A2

// TODO 6 : Mengambil data kabupaten dari tabel 'tb_kabs' dengan parameter 'kode_prov'

require_once 'lib/db_login.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kode_prov'])) {
    $kode_prov = $_GET['kode_prov'];
    $query = "SELECT * FROM tb_kabs WHERE kode_prov = '$kode_prov'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['kode_kab'] . "'>" . $row['nama_kab'] . "</option>";
        }
    } else {
        echo "<option value=''>Tidak ada kabupaten</option>";
    }
}
?>
