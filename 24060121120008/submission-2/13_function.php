<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 9 September 2023
     Lab        : PBP A2
 -->
 
<?php
    //menghitung harga setelah diskon
    //harga sebagai parameter input dan output
    function hitung_diskon3(&$harga, $diskon){
        $harga = $harga - ($harga * $diskon/100);
        return $harga;
    }

    //contoh pemanggilan fungsi
    $harga = 10000;
    $diskon = 20;
    echo 'Harga sebelum diskon = '.$harga.'<br />';
    hitung_diskon3($harga, $diskon);
    echo 'Harga setelah diskon = '.$harga.'<br />';
?>