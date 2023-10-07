<!-- 
    File: show_book.php
    Nama: Adri Audifirst
    NIM: 24060121140152
    Date: 3 September 2023
    Deskripsi: Menampilkan buku
 -->
<?php include('../../components/header.php') ?>
<div class="row w-50 mx-auto mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header">Search Book</div>
            <div class="card-body">
                <input type="text" name="title" id="title" class="form-control" onkeyup="searchBooks()">
                <br>
                <div id="search_results"></div>
                <a href="../../index.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
<?php include('../../components/footer.php') ?>