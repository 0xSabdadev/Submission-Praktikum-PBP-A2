<!-- 
Nama       : Dorino Baharson
NIM        : 24060121130090
Deskripsi  : Belajar Dasar Penggunaan Fungsi dan variabel static PHP
Tanggal    : 9/9/2023
Nama file  : index5.php
-->

<?php
    //define a function
    function diskon(){
        static $harga = 1000;
        $harga = 0.8* $harga;
        echo 'harga = '.$harga.'<br />';
    }
    //set harga
    $harga = 30;
    //memanggil fungsi diskon
    diskon();
    diskon();
    //menampilkan harga
    echo 'harga = '.$harga.'<br />';
?>