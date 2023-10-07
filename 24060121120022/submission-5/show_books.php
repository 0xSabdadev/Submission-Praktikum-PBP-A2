<!--
    Nama Pembuat    : Aprilyanto Setiyawan Siburian
    NIM             : 24060121120022
    Lab             : A2 PBP
    Deskripsi       : File untuk pencarian data buku menggunakan AJAX
-->

<?php include('header.php')?>
<br>
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
<?php include('footer.php')?>
<script src="ajax.js"></script>