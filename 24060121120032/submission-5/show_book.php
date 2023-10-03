<!--File		: show_book.php
	Deskripsi	: menampilkan data buku
-->
<?php include('header.php')?>
<br>
<div class="container">
    <div class="card">
        <div class="card-header">Show Book Data</div>
        <div class="card-body">
            <form method="GET" autocomplete="on">
            <div class="form-group">
	            <label for="judul">Cari Judul:</label>
	            <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <br>
            <button type="button" class="btn btn-primary" onclick="showBook(judul.value)">Search</button>
            <br><br>
            <div id="detail_book"></div>
            </form>
        </div>
    </div>
</div>
<?php include('footer.php')?>