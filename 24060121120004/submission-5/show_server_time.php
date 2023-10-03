<!-- 
    Nama - NIM      : Duma Mora Arta Sitorus - 24060121120004
    Deskripsi Kode  : File yang me-request get_server_time.php dengan menggunakan fungsi get_server_time() 
-->

<?php include('./header.php'); 
//   require_once('ajax.js');
?>

<div class="row w-75 mx-auto text-center">
    <div class="col">
        <div class="card mt-5">
            <div class="card-header">Ajax Server Time</div>
            <div class="card-body">
                <button class="btn btn-success" onclick="get_server_time()">Show Server Time</button>
            <br><br>
            <div id="showtime"></div>
            </div>
        </div>
    </div>
    
</div>


<?php include('./footer.php'); ?>

