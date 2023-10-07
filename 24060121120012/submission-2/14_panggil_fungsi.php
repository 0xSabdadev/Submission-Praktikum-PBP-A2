<?php
/* Nama : Emerio Kevin Aryaputra
NIM  :24060121120012
Lab  : PBP A2
Tanggal : 9 September 2023 */

require_once('13_fungsi2.php');

// panggil fungsi hitung_diskon
$harga = 10000;
$diskon = 20;
$harga_diskon = hitung_diskon($harga, $diskon);
echo 'Harga sebelum diskon = ' . $harga . '<br/>';
echo 'Harga setelah diskon = ' . $harga_diskon . '<br/>';

// fungsi faktorial
echo '<br/>';
print(faktorial(4));