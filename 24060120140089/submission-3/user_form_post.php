<!--
    Nama : Sheva Ivanda Pratama
    NIM : 24060120140089
    Lab : A2
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            user_form_post
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">></style>
    </head>
    <body>
    <form method="POST" autocomplete="on" action="">    
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="kota">Kota/Kabupaten:</label>
            <select id="kota" name="kota" class="form-control">
                <option value="Semarang">Semarang</option>
                <option value="Jakarta">Jakarta</option>
                <option value="Bandung">Bandung</option>
                <option value="Surabaya">Surabaya</option>
            </select>
        </div>
        <label>Jenis Kelamin:</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">Pria
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">Wanita
            </label>
        </div>
        <br>
        <label>Peminatan:</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="coding">Coding
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design">UX Design
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="data_science">Data Science
            </label>
        </div>
        <br>
        <!--Submit, reset dan button-->
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>
<?php
    if (isset($_POST["submit"])){
        echo "<h3>Your input:</h3>";
        echo 'Nama = '.$_POST['nama'].'<br />';
        echo 'Email = '.$_POST['email'].'<br />';
        echo 'Kota = '.$_POST['kota'].'<br />';
        echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'<br />';

        $minat=$_POST['minat'];
        if (!empty($minat)){
            echo 'Peminatan yang dipilih: ';
            foreach($minat as $minat_item){
                echo '<br />'.$minat_item;
            }
        }
    }
?>
</body>
</html>