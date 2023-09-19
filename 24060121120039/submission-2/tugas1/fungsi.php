<?php
    function print_mhs($nama,$nim,$prodi){
        echo 'Nama: '.$nama.'<br />';
        echo 'NIM: '.$nim.'<br />';
        echo 'Prodi: '.$prodi.'<br />';
    }

    function hitung_diskon($harga,$diskon){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
    }

    function hitung_diskon2($harga,$diskon=10){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
    }

    function hitung_diskon3(&$harga,$diskon){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
    }

    function faktorial($n)
    {
        if($n == 0){
            return 1;
        }else{
            return $n * faktorial($n-1);
        }
    }

    

?>