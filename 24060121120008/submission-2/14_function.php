<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 9 September 2023
     Lab        : PBP A2
 -->
 
<?php
    function faktorial($n){
        if($n == 0){
            return 1;
        }else{
            return $n * faktorial($n-1);
        }
    }

    echo 'Faktorial dari 5 adalah '.faktorial(5).'<br />';
?>