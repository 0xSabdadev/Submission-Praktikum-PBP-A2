<!-- 
    Nama - NIM      : Duma Mora Arta Sitorus - 24060121120004
    Deskripsi Kode  : File yang me-request search_result.php dengan menggunakna fugnsi searchBookByTitle
-->
<?php include('./header.php') ?>
<div class="card mt-5">
    <div class="card-header">Search Book</div>
    <div class="card-body">
        <form method="POST"> Masukkan judul buku..
            <input type="text" name="title" id="title" class="form-control"> <br />
            <button type="button" class="btn btn-primary" onclick="searchBooksByTitle()">Cari</button>
            <div id="search-result"></div>
        </form> 
    </div>
</div>
<script src="ajax.js"></script>
<?php include('./footer.php') ?>
