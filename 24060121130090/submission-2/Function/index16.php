<!-- 
Nama       : Dorino Baharson
NIM        : 24060121130090
Deskripsi  : Belajar Dasar fungsi PHP
Tanggal    : 9/9/2023
Nama file  : index16.php
-->

<?php
    function faktorial($n)
    {
    if($n == 0){
    return 1;
    }else{
    return $n * faktorial($n-1);
    }
    }
?> 