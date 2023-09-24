<!-- 
    Name: Adri Audifirst
    NIM: 24060121140152
    Date: 6 September 2023
 -->
<html>

<head>
    <title>Variable Global</title>
</head>

<body>
    <?php
    // Define a function
    function diskon1()
    {
        // Define harga as a global variable
        global $harga;
        // Multiple harga by 0.8
        $harga = 0.8 * $harga;
    }
    // Set harga
    $harga = 2000;
    // Call the function
    diskon1();
    // Display the age
    echo 'harga = ' . $harga . '<br />';
    ?>
</body>

</html>