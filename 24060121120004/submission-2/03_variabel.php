<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
</head>
<body>
    <?php
        echo '1. Implementasi variabel lokal <br />';
        //Define a function
        function diskon(){
            $harga = 1000;
            $harga = 0.2 * $harga;
        }
        $harga = 2000;
        diskon();
        echo 'harga = '.$harga.'<br />';
        //--------------------------------------------------

        echo '<br />2. Implementasi variabel global <br />';
        //Define a function
        function diskon1(){
            // Define harga as a global variabel
            global $harga;
            // Multiple harga by 0.8
            $harga = 0.8*$harga;
        } 
        //Set harga
        $harga = 2000;
        //Call the fuction
        diskon1();
        //display the price
        echo 'harga = '.$harga.'<br />';
        //--------------------------------------------------

        echo '<br />3. Implementasi variabel static <br />';
        // define the function
        function diskon2(){
            // define harga as a static variabel
            static $harga = 1000;
            $harga = 0.8* $harga;

            echo 'harga = '.$harga.'<br />';
        }
        // Set harga to 2000
        $harga = 30;
        // Call the function twice
        diskon2();
        diskon2();
        // display the harga
        echo 'harga = '.$harga.'<br />';
        //--------------------------------------------------

        echo '<br />4. Implementasi variabel super global <br />';
        echo htmlentities($_SERVER["PHP_SELF"]);




    ?>
</body>
</html>