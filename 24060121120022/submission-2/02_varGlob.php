<!DOCTYPE html>
<html>
    <head>
        <title>Variabel dan Konstanta</title>
    </head>
    <body>
        <?php
            // Define a function
            function diskon1() {
                // Define harga as a global variable
                global $harga;
                // Multiple harga by 0.8
                $harga = 0.8 * $harga;
            }
            // Set harga
            $harga = 2000;
            // Call the function
            diskon1();
            // Display the new value of harga
            echo 'harga = '.$harga.'<br>';
            /* harga = 1600 karena $harga di dalam fungsi 
            diskon1() adalah variabel global, sehingga perubahan 
            nilai $harga di dalam fungsi diskon1() akan 
            mempengaruhi nilai $harga di luar fungsi diskon1() */ 
        ?>
    </body>
</html>