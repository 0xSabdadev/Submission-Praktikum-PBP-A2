<?php 
// TODO 1: Inisialisasi session
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

// TODO 2: Hapus username session
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    session_destroy();
}

// TODO 3: Redirect ke halaman login
header('Location: login.php');
?>