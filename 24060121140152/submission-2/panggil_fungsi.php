<!-- 
    Name: Adri Audifirst
    NIM: 24060121140152
    Date: 8 September 2023
 -->
<html>

<head>
    <title>Belajar PHP</title>
</head>

<body>
    <?php
    require_once("fungsi.php");
    //pemanggilan fungsi hitung_diskon
    $harga = 10000;
    $diskon = 20;
    $harga_diskon = hitung_diskon($harga, $diskon);
    echo 'Harga sebelum diskon = ' . $harga . '<br />';
    echo 'Harga setelah diskon = ' . $harga_diskon . '<br />';
    //pemanggilan fungsi faktorial
    print(faktorial(4));
    ?>
</body>

</html>