<!-- // Nama        : Fitra Syamli Yudhisaputra
// NIM         : 24060121140124
// Tanggal     : 26 September 2023
// File		   : logout.php
// Deskripsi   : untuk logout (menghapus session yang dibuat saat login) -->
<?php

session_start();
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    session_destroy();
}
header('Location: login.php');
?>