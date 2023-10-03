<!-- 
    File: show_server_time.php
    Nama: Adri Audifirst
    NIM: 24060121140152
    Date: 3 September 2023
    Deskripsi: Menampilkan waktu server
 -->
<?php include('../../components/header.php') ?>
<div class="row w-75 mx-auto text-center">
    <div class="col">
        <div class="card mt-5">
            <div class="card-header">Ajax Server Time</div>
            <div class="card-body">
                <div class="mb-4 h1" id="showtime"></div>
                <button class="btn btn-success" onclick="get_server_time()">Show Server Time</button>
                <div id="showtime" class="mt-4"></div>
                <a href="../../index.php" class="btn btn-secondary mt-4">Back</a>
            </div>
        </div>
    </div>
</div>
<?php include('../../components/footer.php') ?>