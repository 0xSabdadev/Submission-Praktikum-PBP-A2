<!--
    Nama Pembuat    : Aprilyanto Setiyawan Siburian
    NIM             : 24060121120022
    Lab             : A2 PBP
    Deskripsi       : Implementasi logout.php pada modul praktikum 4
-->

<?php 
// File         : logout.php
// Deskripsi    : Untuk logout (menghapus session yang dibuat saat login)

session_start();
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    session_destroy();
}
header('Location: login.php');
?>