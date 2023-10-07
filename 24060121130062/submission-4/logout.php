<!-- 
File      : logout.php		22/09/23
Penulis   : Varrel / 24060121130062
Deskripsi : menghapus session pada website
-->

<?php
// TODO 1: Inisialisasi session
session_start();

// TODO 2: Hapus username session
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    session_destroy();
}

// TODO 3: Redirect ke halaman login
header('Location: login.php');
?>