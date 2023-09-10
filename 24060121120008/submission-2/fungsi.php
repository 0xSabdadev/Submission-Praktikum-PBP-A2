<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 9 September 2023
     Lab        : PBP A2
 -->
 
<?php
    //contoh fungsi yang tidak mengembalikan nilai (disebut juga prosedur)
    function print_mhs($nama, $nim, $prodi){
        echo 'Nama  : '.$nama.'<br />';
        echo 'NIM   : '.$nim.'<br />';
        echo 'Prodi : '.$prodi.'<br />';
    }

    //menghitung harga setelah diskon
    //parameter input: harga dan diskon
    function hitung_diskon($harga,$diskon){
        $harga = $harga - ($harga * $diskon/100);
        return $harga;
    }

    //menghitung harga setelah diskon
    //parameter input: harga dan diskon
    function hitung_diskon2($harga,$diskon=10){
        $harga = $harga - ($harga * $diskon/100);
        return $harga;
    }

    //menghitung harga setelah diskon
    //harga sebagai parameter input dan output
    function hitung_diskon3(&$harga, $diskon){
        $harga = $harga - ($harga * $diskon/100);
        return $harga;
    }

    function faktorial($n){
        if($n == 0){
            return 1;
        }else{
            return $n * faktorial($n-1);
        }
    }

?>