<!-- Nama: Fitra Syamli Yudhisaputra -->
<!-- NIM: 24060121140124 -->
<!-- Lab: PBP A2 -->
<!-- Deskripsi: Implementasi Code Modul Praktikum 2 -->
<!-- Tanggal: 11/09/2023 -->
<?php
    // Define the function
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
?>