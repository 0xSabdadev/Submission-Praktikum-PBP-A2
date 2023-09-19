<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <?php
        if (isset($_POST['submit'])) {
            $nama = test_input($_POST['nama']);
            if (empty($nama)) {
                $error_nama = "Nama harus diisi";
            } elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }
            $email = test_input($_POST['email']);
            if ($email == '') {
                $error_email = "Email harus diisi";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error_email = "Format email tidak benar";
            }
            $alamat = test_input($_POST['alamat']);
            if ($alamat == '') {
                $error_alamat = "Alamat harus diisi";
            }
            if (!isset($_POST['jenis_kelamin'])) {
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            }
            $kota = $_POST['kota'];
            if ($kota == '' || $kota == 'kota') {
                $error_kota = "Kota harus diisi";
            }
            if (!isset($_POST['minat'])) {
                $error_minat = "Minat harus diisi";
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        } 
    ?>
    <div class="card m-5">
        <form class="card-header" method="POST" autocomplete="on" action="user_form_post1.php">Form Mahasiswa
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
                <div class="error" style="color: red"><?php if(isset($error_nama)) echo $error_nama;?></div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <div class="error" style="color: red"><?php if(isset($error_email)) echo $error_email;?></div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                <div class="error" style="color: red"><?php if (isset($error_alamat)) echo $error_alamat;?></div>
            </div>
            <div class="form-group">
                <label for="kota">Kota</label>
                <select id="kota" name="kota" class="form-control">
                    <option value="Semarang">Semarang</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Surabaya">Surabaya</option>
                </select>
                <div class="error" style="color: red"><?php if (isset($error_kota)) echo $error_kota;?></div>
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
                <div class="error" style="color: red"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?></div>
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
                <div class="error" style="color: red"><?php if (isset($error_minat)) echo $error_minat;?></div>
            <br>

            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <button type="reset" class="btn btn-danger" name="reset" value="Reset">Reset</button>
        </div>
        </form>
    </div>
    <?php
        if (isset($_POST["submit"]) && isset($_POST["email"]) && isset($_POST["alamat"]) && isset($_POST["jenis_kelamin"]) && isset($_POST["kota"]) && isset($_POST["minat"])) {
            echo "<h3>Your Input:</h3>";
            echo 'Nama = '.$_POST['nama'].'<br />';
            echo 'Email = '.$_POST['email'].'<br />';
            echo 'Kota = '.$_POST['kota'].'<br />';
            // $jeniskelamin = !empty($POST['jenis_kelamin'] ? $POST['jenis_kelamin']:null);
            echo 'Jenis Kelamin = ' . $_POST['jenis_kelamin'] . '<br />';
            //echo 'Minat = '.$_POST['minat'].'<br />';

            $minat = $_POST['minat'];
            if (!empty($minat)) {
                echo 'Peminatan yang dipilih: ';
                foreach($minat as $minat_item) {
                    echo '<br />'.$minat_item;
                }
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script>
        function resetForm() {
            document.getElementById('form_mahasiswa').reset();
            document.getElementById('nama').value = "";
            document.getElementById('email').value = "";
            document.getElementById('alamat').value = "";
            document.getElementById('kota').value = "Semarang";
            document.getElementById('.form-check-input').checked = "false";
        }
    </script>
</body>
</html>