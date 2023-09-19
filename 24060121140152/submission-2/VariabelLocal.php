<!-- 
    Name: Adri Audifirst
    NIM: 24060121140152
    Date: 6 September 2023
 -->
<html>

<head>
    <title>
        Variabel Lokal
    </title>
</head>

<body>
    <?php
    // Define a function
    function diskon()
    {
        $harga = 1000;
        $harga = 0.2 * $harga;
    }
    $harga = 2000;
    diskon();
    echo 'harga = ' . $harga . '<br />';
    ?>
</body>

</html>