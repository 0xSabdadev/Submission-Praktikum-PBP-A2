<!-- 
File      : konstanta.php		10/09/23
Penulis   : Fa'iq Rindha Maulana / 24060121130091
Deskripsi : implementasi modul pertemuan 2 (dasar PHP - konstanta)
-->

<?php
    define("PWI", "Permograman Web dan Internet ");
    echo 'Hari ini sedang praktikum '.PWI.'<br />';
    $constant_name = "PWI";
    echo 'Hari ini sedang praktikum '.constant($constant_name).'<br />';
    //konstanta bawaan PHP
    echo 'File yang sedang diproses "'. __FILE__ .' pada baris "'.
    __LINE__ .'"<br />';
?>