<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 9 September 2023
     Lab        : PBP A2
 -->
 
<?php
    define("PWI", "Pemrograman Web dan Internet");
    echo 'Hari ini sedang praktikum '.PWI.'<br />';

    $constant_name = "PWI";
    echo 'Hari ini sedang praktikum '.constant($constant_name).'<br />';

    //konstanta bawaan PHP
    echo 'File yang sedang diproses "'. __FILE__ .' pada baris "'.__LINE__ .'"<br />';
?>