<!-- 
Nama       : Dorino Baharson
NIM        : 24060121130090
Deskripsi  : Belajar Dasar Penggunaan variabel lokal PHP
Tanggal    : 9/9/2023
Nama file  : index3.php
-->


<?php
    //define a function
    function diskon(){
        $harga = 1000;
        $harga = 0.2* $harga;
    }
    $harga = 2000;
    diskon();
    echo 'harga = '.$harga;
?>