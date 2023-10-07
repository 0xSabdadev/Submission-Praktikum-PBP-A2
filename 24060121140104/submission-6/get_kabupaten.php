<?php
// Nama : Divia Shinta Sukarsaatmadja
// Nim  : 24060121140104
// lab  : A2

require_once 'lib/db_login.php';

/* TODO 6 : mengambil data kabupaten dari tabel 'tb_kabs' dengan parameter kode_prov*/
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kode_prov'])) {
    $kode_prov = $_GET['kode_prov'];
    $query = "SELECT * FROM tb_kabs WHERE kode_prov = '$kode_prov'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $options = "<option value=''>Pilih kabupaten</option>"; // Tambahkan opsi default
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='" . $row['kode_kab'] . "'>" . $row['nama_kab'] . "</option>";
        }
        echo $options;
    } else {
        echo "<option value=''>Tidak ada kabupaten</option>";
    }
}
?>