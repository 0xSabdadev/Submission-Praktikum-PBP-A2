<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : Implementasi modul pertemuan 4 (delete_chart.php)
-->

<?php
//Deskripsi: Menghapus session

session_start();
if(isset($_SESSION['cart'])){
    //Fungsi unset() dapat digunakan untuk membatalkan setel variabel
    unset($_SESSION['cart']);
}
header('Location: view_books.php');
?>