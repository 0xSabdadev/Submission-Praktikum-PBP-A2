<!--
Nama: Adri Audifirst
NIM: 24060121140152
-->
<?php
// File: logout.php
// Deskripsi: untuk logout (menghapus session yang dibuat saat login)
session_start();
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    session_destroy();
}
header('Location: login.php');
