<?php
/* Nama : Emerio Kevin Aryaputra
NIM  :24060121120012
Lab  : PBP A2
Tanggal : 9 September 2023 */

$nilai = 'AB';

switch ($nilai) {
    case 'A':
        echo 'Sangat Baik. <br/>';
        break;
    case 'B':
        echo 'Baik. <br/>';
        break;
    case 'C':
        echo 'Cukup. <br/>';
        break;
    case 'D':
        echo 'Kurang. <br/>';
        break;
    case 'E':
        echo 'Tidak lulus. <br/>';
        break;
    default:
        echo 'Nilai invalid! <br/>';
        break;
}