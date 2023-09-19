<!-- Nama: Fitra Syamli Yudhisaputra -->
<!-- NIM: 24060121140124 -->
<!-- Lab: PBP A2 -->
<!-- Deskripsi: Implementasi Code Modul Praktikum 2 -->
<!-- Tanggal: 11/09/2023 -->

<?php
    require_once("function1.php");
    require_once("function2.php");
    require_once("function3.php");
    require_once("function4.php");
    require_once("function5.php");
    //pemanggilan fungsi hitung_diskon
    $harga = 10000;
    $diskon = 20;
    $harga_diskon = hitung_diskon($harga,$diskon);
    echo 'Harga sebelum diskon = '.$harga.'<br />';
    echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
    //pemanggilan fungsi faktorial
    print(faktorial(4));
?>