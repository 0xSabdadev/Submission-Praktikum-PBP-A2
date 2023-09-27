<?php
/* Nama : Emerio Kevin Aryaputra
NIM  :24060121120012
Lab  : PBP A2
Tanggal : 10 September 2023 */

// assigment menggunakan array identifier
for ($i = 0; $i < 10; $i++) {
    $diskon[] = $i * 5;
}

// assigment menggunakan fungsi array
// $diskon = array(0, 10, 20, 30, 40, 50, 60, 70, 80, 90);

// cek apakah variabel bertipe array
if (is_array($diskon))
    echo 'Array';
else
    echo 'Not Array';

echo '<br/><br/>';
echo 'Array awal<br/>';
// menampilkan isi array
$n = sizeof($diskon);
for ($i = 0; $i <= ($n - 1); $i++) {
    echo 'Diskon hari ke-' . ($i + 1) . ' = ' . $diskon[$i] . ' % <br/>';
}

// sort()
echo '<br/><br/>';
echo 'Array setelah sort()<br/>';
sort($diskon);
for ($i = 0; $i <= ($n - 1); $i++) {
    echo 'Diskon hari ke-' . ($i + 1) . ' = ' . $diskon[$i] . ' % <br/>';
}

// asort()
echo '<br/><br/>';
echo 'Array setelah asort()<br/>';
asort($diskon);
for ($i = 0; $i <= ($n - 1); $i++) {
    echo 'Diskon hari ke-' . ($i + 1) . ' = ' . $diskon[$i] . ' % <br/>';
}

// ksort()
echo '<br/><br/>';
echo 'Array setelah ksort()<br/>';
ksort($diskon);
for ($i = 0; $i <= ($n - 1); $i++) {
    echo 'Diskon hari ke-' . ($i + 1) . ' = ' . $diskon[$i] . ' % <br/>';
}