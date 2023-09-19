<!--Nama : Maulana Aliwafi Haykal
NIM : 24060119130108 
Praktikum PBP 3 -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Input Siswa PHP</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </head>
    <style>
        .error{
            color: red;
        }
    </style>
    
    <body> 
        <?php
        if (isset($_POST['submit'])) {
            $nama = test_input($_POST['nama']);
            if (empty($nama)) {
                $error_nama = "Nama harus diisi";
            } elseif (!preg_match("/^[a-zA-Z]*$/", $nama)) {
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }
        
            $email = test_input($_POST['email']);
            if ($email == '') {
                $error_email = "Email harus diisi";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = "Format email tidak benar";
            }
        
            $alamat = test_input($_POST['alamat']);
            if ($alamat == '') {
                $error_alamat = "Alamat harus diisi";
            }
            
            //$jenis_kelamin = $_POST['jenis_kelamin'];
            if (empty($_POST['jenis_kelamin'])) { //$jenis_kelamin == ''
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            }
        
            $kota = $_POST['kota'];
            if ($kota == '' || $kota == 'kota') {
                $error_kota = "Kota harus diisi";
            }
        
            //$minat = $_POST['minat[]'];
            if (empty($_POST['minat'])) {
                $error_minat = "Peminatan harus dipilih";
            }
        }
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <div class="card m-5">
        <div class="card-header">Form Mahasiswa</div>
        <div class="card-body">
        <form name="formDataMhs" autocomplete="on" action="" method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
                <div class="error">
                    <?php if (isset($error_nama)) {
                        echo $error_nama;
                    }
                ?></div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
                <div class="error">
                    <?php if (isset($error_email)) {
                        echo $error_email;
                    }
                ?></div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat"></textarea>
                <div class="error">
                    <?php if (isset($error_alamat)) {
                        echo $error_alamat;
                    }
                ?></div>
            </div>
            <div class="form-group">
                <label for="kota">Kota/ Kabupaten:</label>
                <select id="kota" name="kota" class="form-control">
                    <option value="Semarang">Semarang</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Surabaya">Surabaya</option>
                </select>
                <div class="error">
                    <?php if (isset($error_kota)) {
                        echo $error_kota;
                    }
                ?></div>
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
            <div class="error">
                <?php if (isset($error_jenis_kelamin)) {
                    echo $error_jenis_kelamin;
                }
            ?></div>
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
            <div class="error">
                <?php if (isset($error_minat)) {
                    echo $error_minat;
                }
            ?></div>
            <br>
            <!-- submit dan reset -->
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
        </div></div>
        <?php
        if (isset($_POST["submit"])){
            echo "<h3>Your input:</h3>";
            echo 'Nama = '.$_POST['nama'].'<br/>';
            echo 'Email = '.$_POST['email'].'<br/>';
            echo 'Kota = '.$_POST['kota'].'<br/>';
            if (!empty($_POST['jenis_kelamin'])){
                echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'<br/>';
            }else{
                echo 'Jenis Kelamin = <br/>';
            }
            //echo 'Minat = '.$_GET['minat'].'<br/>';

            //$minat = $_POST['minat'];
            if (!empty($_POST['minat'])){
                $minat = $_POST['minat'];
                echo 'Peminatan yang dipilih: ';
                foreach($minat as $minat_item){
                    echo '<br/>'.$minat_item;
                }
            }   
        }
        ?>
    </body>
</html>