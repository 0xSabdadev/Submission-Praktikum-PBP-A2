<?php
    define("PWI", "Pemograman Web dan Internet");
    echo 'Hari ini sedang praktikum '.PWI.'<br />';
    $constant_name = "PWI";
    echo 'Hari ini sedang praktikum '.constant($constant_name).'<br />';

    echo 'File yang sedang diproses "'. __FILE__ .' pada baris "'. __LINE__ .'"<br />';
?>