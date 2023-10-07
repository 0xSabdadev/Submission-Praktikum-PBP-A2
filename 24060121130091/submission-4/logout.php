<!-- Nama: Fa'iq Rindha Maulana -->
<!-- NIM: 24060121130091 -->
<!-- Lab: PBP A2 -->
<!-- Nama File: logout.php -->
<!-- Deskripsi File: Halaman logout -->
<!-- Tanggal Pembuatan: 22/09/2023 -->

<?php
//File		: logout.php
//Deskripsi	: untuk logout (menghapus session yang dibuat saat login)

   session_start();
   if (isset($_SESSION['username'])) {
      unset($_SESSION['username']);
      session_destroy();
   }
   header('Location: login.php');
?>
