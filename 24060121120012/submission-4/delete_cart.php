<?php
/*
Nama         : Emerio Kevin Aryaputra
NIM          : 24060121120012
Lab          : PBP A2
File         : delete_cart.php
Deskripsi    : Menghapus cart yang sudah diisi.
*/

session_start();
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}
header('Location: show_cart.php');
