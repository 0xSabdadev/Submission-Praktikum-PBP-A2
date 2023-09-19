<?php
    $nilai = 60; //86, 68, 59, 30, 11, 0, 110, -98, 'abc'.
    if ($nilai >= 80 && $nilai <= 100){
        echo 'Nilai : A <br />';
    } else if ($nilai >= 60 && $nilai < 80){
        echo 'Nilai : B <br />';
    } else if ($nilai >= 40 && $nilai < 60) {
        echo 'Nilai : C <br />';
    } else if ($nilai >= 20 && $nilai < 40) {
        echo 'Nilai : D <br />';
    } else if ($nilai >= 0 && $nilai < 20) {
        echo 'Nilai : E <br />';
    } else {
        echo 'Invalid nilai <br />';
    }
?>