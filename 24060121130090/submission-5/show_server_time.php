<?php 
// Nama File : show_server_time.php
// Deskripsi : Menampilkan waktu server saat ini menggunakan metode AJAX 
// Nama      : Dorino Baharson
// Tanggal   : 3 Oktober 2023
// NIM       :24060121130090

include('./header.php'); ?>
<div class="row w-75 mx-auto text-center">
    <div class="col">
        <div class="card mt-5">
            <div class="card-header">Ajax Server Time</div>
            <div class="card-body">
                <div class="mb-4 h1" id="showtime"></div>
                <button class="btn btn-success" onclick="get_server_time()">Show Server Time</button>
            <br><br>
            <div id="showtime"></div>
            </div>
        </div>
    </div>
</div>
<?php include('./footer.php'); ?>