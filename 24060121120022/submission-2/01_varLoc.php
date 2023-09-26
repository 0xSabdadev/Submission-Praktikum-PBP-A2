<!DOCTYPE html>
<html>
    <head>
        <title>Variabel dan Konstanta</title>
    </head>
    <body>
        <?php
            // Define a function
            function diskon() {
                $harga = 1000;
                $harga = 0.2 * $harga;
            }
            $harga = 2000;
            diskon();
            echo 'harga = '.$harga.'<br>';
            /* $harga = 2000 karena $harga di dalam fungsi 
            diskon() hanya berlaku di dalam fungsi tersebut dan 
            tidak berpengaruh pada $harga di luar fungsi diskon() */
        ?>
    </body>
</html>