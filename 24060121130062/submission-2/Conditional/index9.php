<!-- 
File      : index9.php		10/09/23
Penulis   : Varrel / 24060121130062
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