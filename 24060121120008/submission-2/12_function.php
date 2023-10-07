<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 9 September 2023
     Lab        : PBP A2
 -->
 
<?php
    //menghitung harga setelah diskon
    //parameter input: harga dan diskon nilai default=10
    function hitung_diskon2($harga,$diskon=10){
        $harga = $harga - ($harga * $diskon/100);
        return $harga;
    }

    //contoh pemanggilan fungsi
    $harga = 10000;
    $harga_diskon = hitung_diskon2($harga);
    echo 'Harga sebelum diskon = '.$harga.'<br />';
    echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
?>