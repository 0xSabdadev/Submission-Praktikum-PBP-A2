<?php
function diskon1(){
    global $harga;
    $harga = 0.8 * $harga;
}
$harga = 2000;
diskon1();
echo 'harga = '.$harga.'<br />';
?>