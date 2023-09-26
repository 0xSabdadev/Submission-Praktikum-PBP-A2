<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : implementasi modul pertemuan 2 (dasar PHP - konstanta)
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