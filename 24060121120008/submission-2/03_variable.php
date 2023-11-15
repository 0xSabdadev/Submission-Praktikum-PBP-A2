<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 9 September 2023
     Lab        : PBP A2
 -->
 
<?php 
    //Define function
    function diskon1(){
        //Define harga as a global variab;e
        global $harga;
        //Multiple harga by 0.8
        $harga = 0.8 * $harga;
    }

    //Set harga
    $harga = 2000;
    //Call the function
    diskon1();
    //Display the age
    echo 'harga = '.$harga.'<br />';
?>