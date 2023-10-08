<?php include('header.php'); ?>

<div class="container">
    <div class="card">
        <div class="card-header">Search Book Data</div>
        <div class="card-body">
            <div class="mb-3">
                <input type="text" name="keyword" id="keyword" class="form-control" autofocus placeholder="type book title here.." autocomplete="off">
            </div>
            <button name="tombol-cari" id="tombol-cari" class="btn btn-primary" onclick="searchBook()">Search</button>
            <br><br>
            <div id="outcome"></div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<script src="ajax.js"></script>