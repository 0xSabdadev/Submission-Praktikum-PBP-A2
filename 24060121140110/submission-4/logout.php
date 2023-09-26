<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : Implementasi modul pertemuan 4 (logout.php)
-->

<?php
//Deskripsi: Menghapus session yang dibuat saat login

session_start();
if (isset($_SESSION['username'])){
    unset($_SESSION['username']);
    session_destroy();
}
header('Location: login.php');
?>
