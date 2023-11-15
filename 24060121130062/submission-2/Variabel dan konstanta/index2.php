<!-- 
File      : index2.php		10/09/23
Penulis   : Varrel / 24060121130062
Deskripsi : implementasi modul pertemuan 2 (dasar PHP - variabel lokal)
-->

<?php
    // Define a function
    function diskon( ){
        $harga = 1000;
        $harga = 0.2 * $harga;
    }
    $harga = 2000;
    diskon();
    echo 'harga = '.$harga.'<br />';
?>