<?php
require_once('../ajax-starter/lib/db_login.php');

if (isset($_POST['submit'])) {
    $title = test_input($_GET['title']);
    if ($title == '') {
        $title_error = "Title is required";
    }
}

?>

<?php include('../ajax-starter/header.php') ?>
<script src="../ajax-starter/ajax.js"></script>

    <br />
    <div class="col">
        <div class="card">
            <div class="card-header">Search Book</div>
            <div class="card-body">
                <form method="GET" autocomplete="on">
                    <input type="text" class="form-control" id="title" name="title" value="<?php if (isset($title)) echo $title ?>">
                    <div class="text-danger small">
                        <p><?php if (isset($title_error)) echo $title_error ?></p>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="searchBook()">Search</button>
                </form>
            </div>
            <br />
            <div id="detail_book"></div>
        </div>
    </div>


<?php include('../ajax-starter/footer.php') ?>