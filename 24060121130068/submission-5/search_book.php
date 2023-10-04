<!--
File         : search_book.php
Deskripsi    : untuk menampilkan form search book
Nama         : Mitslina
-->

<?php include('./header.php') ?>
<div class="row w-100 mx-auto mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header">Search Book</div>
            <div class="card-body">
                <input type="text" class="form-control" id="title" placeholder="Search Book Title Here"
                value="<?php if (isset($title)) echo $title ?>">
                <button class="btn btn-primary" onclick="searchBooks(document.getElementById('title').value)">Search</button>
                <br> <br>
                <div id="book_detail"></div>
            </div>
        </div>
    </div>
</div>
<?php include('./footer.php') ?>
