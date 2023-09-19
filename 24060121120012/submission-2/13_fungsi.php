<?php
/* Nama : Emerio Kevin Aryaputra
NIM  :24060121120012
Lab  : PBP A2
Tanggal : 9 September 2023 */

/* note : file ini berisi fungsi-fungsi 
serta contoh implementasinya*/

// prosedur
function print_mhs($nama, $nim, $prodi)
{
    echo 'Nama : ' . $nama . '<br/>';
    echo 'NIM : ' . $nim . '<br/>';
    echo 'Prodi : ' . $prodi . '<br/>';
}

print_mhs('Kepin', '1113344', 'Informatika');


// menghitung harga setelah diskon
// parameter input : harga dan diskon
function hitung_diskon($harga, $diskon)
{
    $harga = $harga - ($harga * $diskon / 100);
    return $harga;
}

$harga = 10000;
$diskon = 20;
$harga_diskon = hitung_diskon($harga, $diskon);
echo '<br/>';
echo 'Harga sebelum diskon = ' . $harga . '<br/>';
echo 'Harga setelah diskon = ' . $harga_diskon . '<br/>';


// menghitung harga setelah diskon
// parameter input : harga dan diskon (default = 10)
function hitung_diskon2($harga, $diskon = 10)
{
    $harga = $harga - ($harga * $diskon / 100);
    return $harga;
}

$harga = 10000;
$harga_diskon = hitung_diskon2($harga);
echo '<br/>';
echo 'Harga sebelum diskon = ' . $harga . '<br/>';
echo 'Harga setelah diskon = ' . $harga_diskon . '<br/>';


// menghitung harga setelah diskon
// harga menjadi parameter input dan output
function hitung_diskon3(&$harga, $diskon)
{
    $harga = $harga - ($harga * $diskon / 100);
    return $harga;
}

$harga = 10000;
$diskon = 20;
echo '<br/>';
echo 'Harga sebelum diskon = ' . $harga . '<br/>';
hitung_diskon3($harga, $diskon);
echo 'Harga setelah diskon = ' . $harga . '<br/>';


// fungsi rekursif untuk menghitung nilai faktorial
function faktorial($n)
{
    if ($n == 0) {
        return 1;
    } else {
        return $n * faktorial($n - 1);
    }
}

$n = 10;
echo '<br/>';
echo 'Faktorial dari ' . $n . ' adalah ' . faktorial($n);