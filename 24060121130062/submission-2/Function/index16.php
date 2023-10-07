<!-- 
File      : index16.php		10/09/23
Penulis   : Varrel / 24060121130062
Deskripsi : implementasi modul pertemuan 2 (dasar PHP - function)
-->

<?php
    require_once("index11.php");
    require_once("index12.php");
    require_once("index13.php");
    require_once("index14.php");
    require_once("index15.php");
    //pemanggilan fungsi hitung_diskon
    $harga = 10000;
    $diskon = 20;
    $harga_diskon = hitung_diskon($harga,$diskon);
    echo 'Harga sebelum diskon = '.$harga.'<br />';
    echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
    //pemanggilan fungsi faktorial
    print(faktorial(4));
?>