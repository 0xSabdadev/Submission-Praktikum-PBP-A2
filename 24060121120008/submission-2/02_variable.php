<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 9 September 2023
     Lab        : PBP A2
 -->
 
<?php 
    //Define a function
    function diskon(){
        $harga = 1000;
        $harga = 0.2 * $harga;
    }
    $harga = 2000;
    diskon();
    echo 'harga = '.$harga.'<br />';
?>