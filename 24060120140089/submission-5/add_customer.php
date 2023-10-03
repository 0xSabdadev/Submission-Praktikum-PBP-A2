<!--Nama: Sheva Ivanda Pratama
    NIM : 24060120140089
    Lab : A2-->
<?php include('header.html') ?>
<br>
<div class="card">
    <div class="card-header">Add Customer Data</div>
    <div class="card-body">
        <form method="GET" autocomplete="on">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="address">Adress</label>
                <textarea class="form-control" name="address" id="address"></textarea>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <select name="city" id="city" class="form-control" required>
                    <option value="Airport West">Airport West</option>
                    <option value="Box Hill">Box Hill</option>
                    <option value="Yarraville">Yarraville</option>
                </select>
            </div><br>
            <button type="button" class="btn btn-primary" onclick="add_customer_get()">Add</button>
        </form>
        <br>
        <div id="add_response"></div>
    </div>
</div>
<?php include('footer.html') ?>
<script src="ajax.js"></script>