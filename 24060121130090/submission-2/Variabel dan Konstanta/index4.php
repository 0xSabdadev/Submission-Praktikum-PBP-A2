<!-- 
Nama       : Dorino Baharson
NIM        : 24060121130090
Deskripsi  : Belajar Dasar Penggunaan Fungsi dan variabel global PHP
Tanggal    : 9/9/2023
Nama file  : index4.php
-->

<?php
    //define a function
    function diskon(){
        global $harga;
        $harga = 0.8* $harga;
    }
    //set harga
    $harga = 2000;
    //memanggil fungsi diskon
    diskon();
    //menampilkan harga
    echo 'harga = '.$harga.'<br />';
?>