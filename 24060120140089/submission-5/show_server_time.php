<!--Nama: Sheva Ivanda Pratama
    NIM : 24060120140089
    Lab : A2-->
<?php include('header.html'); ?><br>
    <div class="container">
    <div class="card">
        <div class="card-header">Ajax Server Time</div>
        <div class="card-body">
            <button class="btn btn-success" onclick="get_server_time()">Show Server Time</button>
            <br><br>
        <div id="showtime"></div>
        </div>
    </div>
    </div>
    <?php include('footer.html') ?>
</body>
</html>
<script src="ajax.js"></script>