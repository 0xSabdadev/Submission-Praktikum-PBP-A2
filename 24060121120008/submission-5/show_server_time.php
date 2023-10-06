<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 03 Oktober 2023
     Lab        : PBP A2
 -->
 
<?php include('./header.php'); ?>
<div class="row w-75 mx-auto text-center">
    <div class="col">
        <div class="card mt-5">
            <div class="card-header">Ajax Server Time</div>
            <div class="card-body">
                <button class="btn btn-success" onclick="get_server_time()">Show Server Time</button>
                <br><br>
                <div class="mb-4 h1" id="showtime"></div>
            </div>
        </div>
    </div>
</div>
<?php include('./footer.php'); ?>