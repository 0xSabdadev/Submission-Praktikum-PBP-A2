<?php

// Nama : Ardian Fajar Widyaputra
// Nim  : 24060121140116
// lab  : A2

require_once 'lib/db_login.php';

if (isset($_POST['kode_prov'])) {
    $kodeProvinsi = $_POST['kode_prov'];
    $query = "SELECT * FROM tb_kabs WHERE kode_prov = '$kodeProvinsi'";
    $result = $db->query($query);

    if ($result) {
        $kabupaten = [];
        while ($row = $result->fetch_assoc()) {
            $kabupaten[] = [
                'kode_kab' => $row['kode_kab'],
                'nama_kab' => $row['nama_kab'],
            ];
        }

        echo json_encode(['success' => true, 'kabupaten' => $kabupaten]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>