<?php
    // Nama : Mitslina
    // NIM  : 24060121130068
    
    // SINGLE IF ELSE********************************************
    echo '<br />SINGLE IF-ELSE<br />';
    $lulus = TRUE;
    if ($lulus){
        echo 'Selamat Anda Lulus. <br/>';
    }else{
        echo 'Maaf, Anda gagal. Silakan mencoba lagi. <br />';
    }

    // MULTIPLE IF ELSE********************************************
    echo '<br />MULTIPLE IF-ELSE<br />';
    // $nilai = 60;
    // $nilai = 86;
    // $nilai = 59;
    // $nilai = 30;
    // $nilai = 11;
    // $nilai = 0;
    $nilai = 110;
    // $nilai = -98;
    // $nilai = 'abc';
    if ($nilai >= 80 && $nilai <= 100){
        echo 'Nilai : A <br />';
    }elseif ($nilai >= 60 && $nilai < 80){
        echo 'Nilai : B <br />';
    }elseif ($nilai >= 40 && $nilai < 60){
        echo 'Nilai : C <br />';
    }elseif ($nilai >= 20 && $nilai < 40){
        echo 'Nilai : D <br />';
    }elseif ($nilai >= 0 && $nilai < 20){
        echo 'Nilai : E <br />';
    }else{
        echo 'Invalid nilai <br />';
    }

    // SWITCH********************************************
    echo '<br />SWITCH<br />';
    $nilai = 'A';
    // $nilai = 'B';
    // $nilai = 'C';
    // $nilai = 'D';
    // $nilai = 'E';
    // $nilai = 'AB';
    switch ($nilai) {
        case "A":
            echo "Sangat Baik. <br />";
            break;
        case "B":
            echo "Baik. <br />";
            break;
        case "C":
            echo "Cukup. <br />";
            break;
        case "D":
            echo "Kurang. <br />";
            break;
        case "E":
            echo "Tidak Lulus. <br />";
            break;
        default:
            echo "Invalid nilai! <br />";
            break;
    }
?>
