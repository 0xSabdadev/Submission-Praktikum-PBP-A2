<!-- // Nama         : Fitra Syamli Yudhisaputra
// NIM          : 24060121140124
// Tanggal      : 26 September 2023
//File          : delete_cart.php
//Deskripsi     : untuk menghapus session -->
<?php
session_start();
if (isset($_SESSION['cart'])) {
    //Fungsi unset() dapat digunakan untuk membatalkan setel variabel
    unset($_SESSION['cart']);
}
header('Location: view_books.php');
?>