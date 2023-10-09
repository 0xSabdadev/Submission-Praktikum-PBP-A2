<?php include 'header.php'; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show Books Data</div>
                <div class="card-body">
                    <form action="" method="GET" autocomplete="on">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <textarea name="title" id="title" class="form-control"></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <!-- Tambahkan margin-top di sini -->
                            <!-- Menambahkan gaya tombol sedang (.btn-md) -->
                            <button type="button" class="btn btn-primary btn-md btn-block"
                                onclick="showBooks()">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Books Details</div>
                <div class="card-body" id="detail_books">
                    <!-- Hasil pencarian buku akan ditampilkan di sini -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<style>
.container {
    max-width: 800px;
}

.card {
    margin-bottom: 20px;
}
</style>

<script>
function showBooks() {
    var xmlhttp = getXMLHTTPRequest();
    var title = encodeURI(document.getElementById('title').value);

    if (title != "") {
        var url = "get_books.php?title=" + title;
        var inner = "detail_books";

        xmlhttp.open('GET', url, true);
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.send(null);
    } else {
        alert("Please fill all the fields");
    }
}
</script>