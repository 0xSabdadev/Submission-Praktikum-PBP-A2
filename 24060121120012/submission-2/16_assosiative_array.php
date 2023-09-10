<?php
/* Nama : Emerio Kevin Aryaputra
NIM  :24060121120012
Lab  : PBP A2
Tanggal : 10 September 2023 */

// assigment menggunakan fungsi array
$bulan = array(
    'jan' => 'Januari',
    'feb' => 'Februari',
    'mar' => 'Maret',
    'apr' => 'April',
    'mei' => 'Mei',
    'jun' => 'Juni',
    'jul' => 'Juli',
    'agu' => 'Agustus',
    'sep' => 'September',
    'okt' => 'Oktober',
    'nov' => 'November',
    'des' => 'Desember'
);

echo 'Array awal<br/>';
// menampilkan isi array
foreach ($bulan as $kode_bulan => $nama_bulan) {
    echo 'Kode bulan "' . $kode_bulan . '" => "' . $nama_bulan . '" <br/>';
}

// asort()
echo '<br/><br/>';
echo 'Array setelah asort()<br/>';
asort($bulan);
foreach ($bulan as $kode_bulan => $nama_bulan) {
    echo 'Kode bulan "' . $kode_bulan . '" => "' . $nama_bulan . '" <br/>';
}

// ksort()
echo '<br/><br/>';
echo 'Array setelah ksort()<br/>';
ksort($bulan);
foreach ($bulan as $kode_bulan => $nama_bulan) {
    echo 'Kode bulan "' . $kode_bulan . '" => "' . $nama_bulan . '" <br/>';
}

// sort()
echo '<br/><br/>';
echo 'Array setelah sort()<br/>';
sort($bulan);
foreach ($bulan as $kode_bulan => $nama_bulan) {
    echo 'Kode bulan "' . $kode_bulan . '" => "' . $nama_bulan . '" <br/>';
}