<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : menampilkan data buku
 -->

<?php include('header.html')?>
<br>
<div class="container">
    <div class="card">
        <div class="card-header" style="text-align:center">Show Books Data</div>
        <div class="card-body">
            <form method="GET" autocomplete="on">
            <div class="form-group">
	            <label for="book">Cari :</label>
	            <input type="text" class="form-control" id="book" name="book">
            </div>
            <div id="detail_books"></div>
            <button type="button" class="btn btn-primary" onclick="showBooks(book.value)" class="button">Search</button>
            </form>
        </div>
    </div>
</div>
<?php include('footer.html')?>
<script src="ajax.js"></script>