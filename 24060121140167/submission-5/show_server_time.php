<?php include 'header.html'; ?>
<br>
<div class="card m-5">
    <div class="card-header">Ajax Server Time</div>
    <div class="card-body">
        <button class="btn btn-success" onclick="get_server_time()">Show Server Time</button>
        <br><br>
        <div id="showtime"></div>
    </div>
</div>
<?php include 'footer.html'; ?>