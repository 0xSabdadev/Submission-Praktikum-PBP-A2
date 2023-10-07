<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
</head>
<body>
    <?php
    require_once("11_fungsi.php");
    
    //pemanggilan fungsi hitung_diskon
    $harga = 10000;
    $diskon = 20;
    $harga_diskon = hitung_diskon($harga, $diskon);
    echo '<br />Harga sebelum diskon = '.$harga.'<br />';
    echo 'Harga setelah diskon = '.$harga_diskon.'<br />'.'<br />';
    
    //pemanggilan fungsi faktorial
    print(faktorial(4));
    ?>
</body>
</html>