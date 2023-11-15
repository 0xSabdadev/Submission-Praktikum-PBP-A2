<!-- Nama: Fa'iq Rindha Maulana -->
<!-- NIM: 24060121130091 -->
<!-- Lab: PBP A2 -->
<!-- Deskripsi File: Membuat function print_mhs($array_mhs) untuk menampilkan data nilai mahasiswa (rata-rata) -->
<!-- Tanggal Pembuatan: 11/09/2023 -->

<?php
// array untuk menyimpan data nilai mahasiswa
$array_mhs = array(
    'Abdul' => array(89,90,54),
    'Budi'  => array(78,60,64),
    'Nina'  => array(67,56,84),
    'Budi'  => array(87,69,50),
    'Budi'  => array(98,65,74)
);
// fungsi untuk mencari nilai rata-rata mahasiswa
function hitung_rata($array){
    $array = array_sum($array)/3;
    return $array;
}
// fungsi untuk menampilkan data nilai mahasiswa
function print_mhs($array_mhs){
    foreach($array_mhs as $key => $value){
        echo "<tr>";
        echo "<td style='text-align: left;'> $key </td>";
        echo "<td style='text-align: left;'> $value[0] </td>";
        echo "<td style='text-align: left;'> $value[1] </td>";
        echo "<td style='text-align: left;'> $value[2] </td>";
        $array = array($value[0], $value[1], $value[2]);
        $hasil = hitung_rata($array);
        echo "<td style='text-align: left;'> $hasil </td>";
        echo "</tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<header>
    <title>Tugas Pertemuan 2</title>
    <style>
        th {
            text-align: left;
        }
    </style>
</header>
<body>
<table border="1">
    <tr>
        <tr>
            <th>Nama</th>
            <th>Nilai 1</th>
            <th>Nilai 2</th>
            <th>Nilai 3</th>
            <th>Rata2</th>
        </tr>
        <?php print_mhs($array_mhs) ?>
    </tr>
</body>
</html>
