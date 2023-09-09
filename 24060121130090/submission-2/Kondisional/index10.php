<!-- 
Nama       : Dorino Baharson
NIM        : 24060121130090
Deskripsi  : Belajar Dasar switch case PHP
Tanggal    : 9/9/2023
Nama file  : index10.php
-->

<?php
    $nilai = 'AB';
    switch($nilai){
        case "A":
            echo 'Sangat Baik. <br />';
            break;
        case "B":
            echo 'Baik. <br />';
            break;
        case "C":
            echo 'Cukup. <br />';
            break;
        case "D":
            echo 'Kurang. <br />';
            break;
        case "E":
            echo 'Tidak Lulus. <br />';
            break;
        default:
            echo 'Invalid Nilai. <br />';
            break;
    }
?>