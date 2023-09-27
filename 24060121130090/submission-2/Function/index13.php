<!-- 
Nama       : Dorino Baharson
NIM        : 24060121130090
Deskripsi  : Belajar Dasar fungsi PHP
Tanggal    : 9/9/2023
Nama file  : index13.php
-->

<?php
    function hitung_diskon($harga,$diskon){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
    }

    $harga = 10000;
    $diskon = 20;
    $harga_diskon = hitung_diskon($harga,$diskon);
    echo 'harga sebelum diskon = '.$harga.'<br />';
    echo 'harga setelah diskon = '.$harga_diskon.'<br />';
?>