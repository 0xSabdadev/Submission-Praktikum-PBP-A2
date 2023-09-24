<?php
    //Define a function 
    function diskon2(){
        //Define harga as a global variabel
        global $harga;
        //Multiple harga by 0.8
        $harga = 0.8 * $harga;
        echo 'harga = '.$harga.'<br />';
    }
    //Set harga to 2000
    $harga = 30;
    //Call the function twice
    diskon2();
    diskon2();
    //Display harga
    echo 'harga = '.$harga.'<br />';
?>