<?php
// Nama File : show_books.php
// Deskripsi : Menampilkan buku berdasarkan judul yang diberikan menggunakan metode AJAX  GET
// Nama      : Dorino Baharson
// Tanggal   : 3 Oktober 2023
// NIM       :24060121130090

include('./header.php') ?>
    <div class="card m-5">
        <div class="card-header">Show Books Data</div>
        <div class="card-body">
            <div class="form-group">
            <form action="" method="GET" autocomplete="on">
            <textarea name="title" id="title" class="form-control"></textarea>
        <br>
        <button type="button" class="btn btn-primary" onclick="showBooks()">Submit</button>
        </div>
        <div class="form-group">
            <div id="detail_books"></div>
        </div>
        </form>
        </div>
    </div>
<?php include('./footer.php'); ?>