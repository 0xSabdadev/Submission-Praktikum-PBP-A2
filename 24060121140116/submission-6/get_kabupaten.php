<?php
// Nama : Ardian Fajar Widyaputra
// Nim  : 24060121140116
// lab  : A2

require_once 'lib/db_login.php';

if(isset($_GET['kode_prov'])) {
    $kode_prov = $_GET['kode_prov'];

    // Menggunakan try-catch untuk menangani kesalahan koneksi dan query
    try {
        // TODO 6 : Ambil data kabupaten dari tabel 'tb_kabs' dengan parameter 'kode_prov'
        $query = "SELECT kode_kab, nama_kab FROM tb_kabs WHERE kode_prov = :kode_prov";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':kode_prov', $kode_prov);
        $stmt->execute();

        // Buat daftar pilihan Kabupaten
        echo '<option value="">Pilih Kabupaten</option>';
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Menggunakan htmlspecialchars untuk menghindari potensi serangan XSS
            $kode_kab = htmlspecialchars($row['kode_kab'], ENT_QUOTES, 'UTF-8');
            $nama_kab = htmlspecialchars($row['nama_kab'], ENT_QUOTES, 'UTF-8');
            
            echo "<option value='$kode_kab'>$nama_kab</option>";
        }
    } catch (PDOException $e) {
        // Menangani kesalahan query atau koneksi
        die("Error: " . $e->getMessage());
    }
}
?>