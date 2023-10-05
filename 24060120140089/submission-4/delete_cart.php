<!--Nama: Sheva Ivanda Pratama
    NIM : 24060120140089
    Lab : A2-->
<?php
//File      : destroy_session.php
//Deskripsi : untuk logout (menghapus session yang dibuat saat login)

session_start(); //inisialisasi session
if (isset($_SESSION['cart'])){
    unset($_SESSION['cart']);
}
header('Location: show_cart.php');
?>
