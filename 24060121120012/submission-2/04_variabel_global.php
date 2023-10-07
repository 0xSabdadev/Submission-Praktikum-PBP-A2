<?php
/* Nama : Emerio Kevin Aryaputra
NIM  :24060121120012
Lab  : PBP A2
Tanggal : 9 September 2023 */

function diskon1()
{
    global $harga;
    $harga = 0.8 * $harga;
}

$harga = 2000;
diskon1();
echo 'Harga = ' . $harga . '<br/>';