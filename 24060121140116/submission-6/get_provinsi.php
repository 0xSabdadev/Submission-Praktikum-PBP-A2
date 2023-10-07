<?php
// Nama : Ardian Fajar Widyaputra
// Nim  : 24060121140116
// lab  : A2

require_once 'lib/db_login.php';

$query = "SELECT kode_prov, nama_prov FROM tb_provs"; // Hanya memilih kolom yang diperlukan
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br/>" . $db->error);
} else {
    echo '<option value="">Pilih Provinsi</option>'; // Opsi default
    while ($row = $result->fetch_object()) {
        // Menggunakan htmlspecialchars untuk menghindari potensi serangan XSS
        $kode_prov = htmlspecialchars($row->kode_prov, ENT_QUOTES, 'UTF-8');
        $nama_prov = htmlspecialchars($row->nama_prov, ENT_QUOTES, 'UTF-8');
        
        echo "<option value='$kode_prov'>$nama_prov</option>";
    }
}
?>