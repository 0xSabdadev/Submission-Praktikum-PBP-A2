<!-- 
Nama       : Dorino Baharson
NIM        : 24060121130090
Deskripsi  : Belajar Dasar pemanggilan fungsi PHP
Tanggal    : 9/9/2023
Nama file  : index17.php
-->

<?php
    require_once("index12.php");
    require_once("index13.php");
    require_once("index14.php");
    require_once("index15.php");
    require_once("index16.php");
    //pemanggilan fungsi hitung_diskon
    $harga = 10000;
    $diskon = 20;
    $harga_diskon = hitung_diskon($harga,$diskon);
    echo 'Harga sebelum diskon = '.$harga.'<br />';
    echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
    //pemanggilan fungsi faktorial
    print(faktorial(4));
?> 