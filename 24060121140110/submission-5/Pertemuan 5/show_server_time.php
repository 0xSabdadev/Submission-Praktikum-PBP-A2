<!-- 
    Nama        : Mulya Irwansyah
    NIM         : 24060121140110
    Deskripsi   : menampilkan waktu server dengan ajak
 -->

<?php include('header.html'); ?><br>
<div class="container">
    <div class="card">
        <div class="card-header" style="text-align:center">Ajax Server Time</div>
        <div class="card-body">
            <button class="btn btn-success" onclick="get_server_time()">Show Server Time</button>
            <br><br>
            <div id="showtime"></div>
        </div>
    </div>
</div>
<?php include('footer.html'); ?><br>
<script src="ajax.js"></script>