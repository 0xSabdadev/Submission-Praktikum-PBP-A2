<!--Nama: Sheva Ivanda Pratama
    NIM : 24060120140089
    Lab : A2-->
<?php
//File      : logout.php
//Deskripsi : untuk logout (menghapus session yang dibuat saat login)

session_start(); //inisialisasi session
if (isset($_SESSION['username'])){
    unset($_SESSION['username']);
    session_destroy();
}
header('Location: login.php');
?>
