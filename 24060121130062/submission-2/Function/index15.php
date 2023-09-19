<!-- 
File      : index15.php		10/09/23
Penulis   : Varrel / 24060121130062
Deskripsi : implementasi modul pertemuan 2 (dasar PHP - function)
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