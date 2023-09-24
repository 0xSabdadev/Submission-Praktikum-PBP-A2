<?php 
    //assign nilai ke variabel
    echo '============VARIABLE================ <br />';
    $a = 15;
    echo 'Variabel a berisi : '.$a.'<br />';
    $a = 'Pemrograman Web dan Internet';
    echo 'Variabel a berisi : '.$a.'<br />';

    /*Variable Lokal*/
    echo '============VARIABLE LOKAL================  <br />';
    // Define a function
    function diskon( ){
        $harga = 1000;
        $harga = 0.2 * $harga;
        echo'Diskon = '.$harga.' <br />';
    }
    $harga = 2000;
    diskon();
    diskon();
    echo 'harga = '.$harga.'<br />';

    /*Variable Global*/
    echo '============VARIABLE GLOBAL================  <br />';
    function diskon1( ){
        // Define harga as a global variable
        global $harga;
        // Multiple harga by 0.8
        $harga = 0.8 * $harga;
        echo 'diskon1 = '.$harga.'<br />';
    }
    // Set harga
    $harga = 2000;
    // Call the function
    diskon1( );
    diskon1( );
    // Display the age
    echo 'harga = '.$harga.'<br />';

    /*Variable Static*/
    echo '============VARIABLE STATIC================  <br />';
    function diskon2( ){
        // Define harga as a static variable
            static $harga = 1000;
            $harga = 0.8 * $harga;
            
            echo 'harga = '.$harga.'<br />';
        }
        // Set harga to 2000
        $harga = 30;
        // Call the function twice
        diskon2();
        diskon2();
        // Display the harga
        echo 'harga = '.$harga.'<br />';

    
    /*CONSTANTA*/
    echo '============CONSTANTA================  <br />';
    define("PWI", "Permograman Web dan Internet ");
    echo 'Hari ini sedang praktikum '.PWI.'<br />';
    $constant_name = "PWI";
    
    echo 'Hari ini sedang praktikum '.constant($constant_name).'<br />';
?>