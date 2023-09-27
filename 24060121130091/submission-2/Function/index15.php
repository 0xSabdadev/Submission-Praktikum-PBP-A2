<!-- 
File      : index15.php		10/09/23
Penulis   : Fa'iq Rindha Maulana / 24060121130091
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