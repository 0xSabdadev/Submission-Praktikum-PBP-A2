<!-- 
    File: index.php
    Nama: Adri Audifirst
    NIM: 24060121140152
    Date: 3 September 2023
    Deskripsi: Halaman index (utama) Bookorama
 -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<?php include('./components/header.php') ?>

<div class="jumbotron mt-4">
    <div class="d-flex flex-column align-items-center">
        <h1 class="display-4" style="font-family: 'Open Sans', sans-serif;">Bookorama</h1>
        <p class="lead" style="font-family: 'Open Sans', sans-serif;">Ini sangat sulit &#128557</p>
        <hr class="my-4">
        <p style="font-family: 'Open Sans', sans-serif;">Bang Jason. Saya trauma dengan php + ajax </p>
        <div class="dropdown">
            <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: 'Open Sans', sans-serif;">
                Cek Kelengkapan Tugas Saya
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="./app/view/show_server_time.php">Show Server Time</a>
                <a class="dropdown-item" href="./app/view/add_customer.php">Add Customer w/ POST & GET</a>
                <a class="dropdown-item" href="./app/view/show_customer.php">Show Customer</a>
                <a class="dropdown-item" href="./app/view/show_book.php">Search Book Title</a>
            </div>
        </div>
    </div>
</div>

<?php include('./components/footer.php') ?>