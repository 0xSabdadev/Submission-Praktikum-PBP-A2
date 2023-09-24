<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : implementasi modul pertemuan 2 (dasar PHP - function)
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