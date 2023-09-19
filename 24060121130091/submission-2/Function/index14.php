<!-- 
File      : index14.php		11/09/23
Penulis   : Fa'iq Rindha Maulana / 24060121130091
Deskripsi : implementasi modul pertemuan 2 (dasar PHP - function)
-->

<?php
    //menghitung harga setelah diskon
    //harga sebagai parameter input dan output
    function hitung_diskon3(&$harga,$diskon){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
    }
    //contoh pemanggilan fungsi
    $harga = 10000;
    $diskon = 20;
    echo 'Harga sebelum diskon = '.$harga.'<br />';
    hitung_diskon3($harga,$diskon);
    echo 'Harga setelah diskon = '.$harga.'<br />';
?>