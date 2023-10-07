<!--
    Nama Pembuat    : Aprilyanto Setiyawan Siburian
    NIM             : 24060121120022
    Lab             : A2 PBP
    Deskripsi       : Implementasi delete_cart.php pada modul praktikum 4
-->

<?php 
// File         : delete_cart.php
// Deskripsi    : untuk menghapus session

session_start();
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

header('Location: show_cart.php');
?>