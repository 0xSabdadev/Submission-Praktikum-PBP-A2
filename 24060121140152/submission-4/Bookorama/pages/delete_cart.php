<!--
Nama: Adri Audifirst
NIM: 24060121140152
File: delete_cart.php
// Deskripsi    : untuk menghapus session
-->
<?php
// TODO 1: Inisialisasi data session
session_start();
if (isset($_SESSION['cart'])) {
    // TODO 2: Hapus session
    unset($_SESSION['cart']);
}
// TODO 3: Redirect ke halaman show_cart.php -->
header('Location: show_cart.php');
?>