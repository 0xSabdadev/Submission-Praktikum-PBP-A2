<!-- 
File      : switch.php		11/09/23
Penulis   : Fa'iq Rindha Maulana / 24060121130091
Deskripsi : implementasi modul pertemuan 2 (dasar PHP - switch)
-->

<?php
    $nilai = 'AB';
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