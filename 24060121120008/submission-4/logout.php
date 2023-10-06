<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 25 September 2023
     Lab        : PBP A2
 -->
 
<?php 
// TODO 1: Inisialisasi session
session_start();

// TODO 2: Hapus username session
if(isset($_SESSION['username'])){
    unset($_SESSION['username']);
    session_destroy();
}

// TODO 3: Redirect ke halaman login
header('Location: login.php');
?>