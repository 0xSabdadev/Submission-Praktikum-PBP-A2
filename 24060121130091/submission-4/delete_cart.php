<!-- Nama: Fa'iq Rindha Maulana -->
<!-- NIM: 24060121130091 -->
<!-- Lab: PBP A2 -->
<!-- Nama File: delete_chart.php -->
<!-- Deskripsi File: Untuk menghapus chart -->
<!-- Tanggal Pembuatan: 22/09/2023 -->

<?php
//File: delete_cart.php
//Deskripsi: untuk menghapus session

    session_start();
    if(isset($_SESSION['cart'])){
        //Fungsi unset() dapat digunakan untuk membatalkan setel variabel
        unset($_SESSION['cart']);
    }
    header('Location: view_books.php');
?>