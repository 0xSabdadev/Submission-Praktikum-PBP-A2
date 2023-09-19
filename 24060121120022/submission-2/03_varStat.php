<!DOCTYPE html>
<html>
    <head>
        <title>Variabel dan Konstanta</title>
    </head>
    <body>
        <?php
            // Define the function
            function diskon2() {
                // Define harga as a static variable
                static $harga = 1000;
                $harga = 0.8 * $harga;
                echo 'harga = '.$harga.'<br>';
            }
            // Set harga to 2000
            $harga = 30;
            // Call the function twice
            diskon2();
            diskon2();
            // Display the harga
            echo 'harga = '.$harga.'<br>';
            /* harga = 800, harga = 640 karena nilai $harga 
            dipertahankan di antara panggilan fungsi berikutnya. 
            Sedangkan harga = 30 karena $harga di luar fungsi */
        ?>
    </body>
</html>