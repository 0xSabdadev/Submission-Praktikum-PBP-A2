<?php include 'header.html'; ?>
    <br>
    <div class="card m-5">
        <div class="card-header">Form Add Customer</div>
        <div class="card-body">
            <form method="GET" autocomplete="on">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <br>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea type="text" class="form-control" id="address" name="address"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="city">City:</label>
                    <select name="city" id="city" class="form-control" required>
                        <option value="Airport West">Airport West</option>
                        <option value="Box Hill">Box Hill</option>
                        <option value="Yarraville">Yarraville</option>
                    </select>
                </div><br>
                <button type="button" class="btn btn-primary" onclick="add_customer_get()">Add (GET)</button>
                <button type="button" class="btn btn-primary" onclick="add_customer_post()">Add (POST)</button>
            </form>
            <br>
            <div id="add_response"></div>
        </div>
    </div>
<script src="ajax.js"></script>
<?php include 'footer.html';?>