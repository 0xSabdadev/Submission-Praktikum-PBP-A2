<!-- Nama: Fa'iq Rindha Maulana -->
<!-- NIM: 24060121130091 -->
<!-- Lab: PBP A2 -->
<!-- Nama File: search_book.php -->
<!-- Deskripsi File: File untuk menampilkan halaman pencarian buku -->
<!-- Tanggal Pembuatan: 01/10/2023 -->

<?php include('header.php') ?>
<br>
<div class="container">
    <div class="card">
        <div class="card-header">Search Book Data</div>
        <div class="card-body">
            <div class="mb-3">
                <label for="find" class="form-label">Find Book:</label>
                <input type="text" name="keyword" id="keyword" class="form-control" autofocus placeholder="type here.."
                    autocomplete="off">
            </div>
            <button name="tombol-cari" id="tombol-cari" class="btn btn-primary" onclick="searchBook()">Search</button>
            <br><br>
            <div id="hasil"></div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>
<script src="ajax.js"></script>