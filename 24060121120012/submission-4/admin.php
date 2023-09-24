<?php
/*
Nama         : Emerio Kevin Aryaputra
NIM          : 24060121120012
Lab          : PBP A2
File         : admin.php
Deskripsi    : Halaman yang hanya tampil setelah admin login, 
                jika belum redirect ke login.php
*/

// TODO 1: Inisialisasi session
session_start();

// TODO 2: Periksa apakah session dengan key username terdefinisi
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

include('./header.php');
?>
<br>
<div class="card">
    <div class="card-header">Admin Page</div>
    <div class="card-body">
        <p>Welcome...</p>
        <p>You are logged in as <b><?= $_SESSION['username']; ?></b></p>
        <br><br>
        <a class="btn btn-secondary" href="view_customer.php">Back</a>
        <a class="btn btn-danger" href="logout.php">Logout</a>
    </div>
</div>
<?php include('./footer.php') ?>