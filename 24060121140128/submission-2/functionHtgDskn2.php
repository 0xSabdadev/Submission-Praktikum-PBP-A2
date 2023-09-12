<?php
    function hitung_diskon2($harga,$diskon=10){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
        }
        
        $harga = 10000;
        $harga_diskon = hitung_diskon2($harga);
        echo 'Harga sebelum diskon = '.$harga.'<br />';
        echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
?>