<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
        .form-group {
            margin-bottom: 16px;
        }

        label {
            margin-bottom: 8px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            margin-bottom: 8px;
        }

        /* Tambahkan gaya untuk pesan kesalahan (error warning) */
        .error {
            color: red;
        }
    </style>

    <title>Form Mahasiswa</title>
</head>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
        .form-group {
            margin-bottom: 16px;
        }

        label {
            margin-bottom: 8px;
        }
    </style>

    <title>Form Mahasiswa</title>
</head>

<body>
    <div class="container">
        <div class="card w-50 mx-auto mt-5">
            <div class="card-body">
                <h5 class="card-title mb-3">Form Mahasiswa</h5>
                <?php 
                    error_reporting(false); 

                    if(isset($_POST['submit'])){
                        $nama = test_input($_POST['nama']);
                        if(empty($nama)){
                            $error_nama = "Nama harus diisi";
                        }
                        elseif(!preg_match("/^[a-zA-Z]*S/", $nama)){
                            $error_nama = "Nama hanya dapat berisi huruf dan spasi";
                        }

                        $email = test_input($_POST['email']);
                        if($email == ''){
                            $error_email = "Email harus diisi";
                        }
                        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $error_email = 'Format email tidak benar';
                        }

                        $alamat = test_input($_POST['alamat']);
                        if($alamat == ''){
                            $error_alamat = "Alamat harus diisi";
                        }

                        $jenis_kelamin = $_POST['jenis_kelamin'];
                        if($jenis_kelamin == ''){
                            $error_jenis_kelamin = "Jenis kelamin harus diisi";
                        }

                        $kota = $_POST['kota'];
                        if($kota == '' || $kota == 'kota'){
                            $error_kota = "Kota harus diisi";
                        }

                        $minat = $_POST['minat'];
                        if(empty($minat)){
                            $error_minat = "Peminatan harus dipilih";
                        }

                    }
                    function test_input($data){
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                
                ?>

                <form method="POST" autocomplete="on" action="">
                    <!-- Masukkan element form disini -->
                    <div class="form-group">
                        <label for="nama">Nama: </label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if(isset($nama)) {echo $nama;} ?>">
                        <div class="error"><?php if(isset($error_nama)) echo $error_nama; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($email)) {echo $email;} ?>">
                        <div class="error"><?php if(isset($error_email)) echo $error_email; ?></div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" id="alamat" rows="3" name="alamat"><?php if(isset($alamat)) {echo $alamat;} ?></textarea>
                        <div class="error"><?php if(isset($error_alamat)) echo $error_alamat; ?></div>
                    </div>
                    </div>  
                    <div class="form-group">
                        <label for="kota">Kota/Kabupaten:  </label>
                        <select name="kota" id="kota" class="form-control">
                            <option value="Semarang" <?php if(isset($kota) && $kota =='Semarang') echo 'selected="true"'; ?>>Semarang</option>
                            <option value="Jakarta" <?php if(isset($kota) && $kota =='Jakarta') echo 'selected="true"'; ?>>Jakarta</option>
                            <option value="Bandung" <?php if(isset($kota) && $kota =='Bandung') echo 'selected="true"'; ?>>Bandung</option>
                            <option value="Surabaya" <?php if(isset($kota) && $kota =='Surabaya') echo 'selected="true"'; ?>>Surabaya</option>
                        </select>
                        <div class="error"><?php if(isset($error_kota)) echo $error_kota; ?></div>
                    </div>
                    <label>Jenis Kelamin:</label>
                    <div class="form-check">
                        <label for="" class="form-check-label">
                            <input type="radio"class='form-check-input' name="jenis_kelamin" value="pria" <?php if(isset($jenis_kelamin) && $jenis_kelamin === 'pria') echo 'checked'; ?>>Pria
                        </label>
                    </div>
                    <div class="form-check">
                        <label for="" class="form-check-label">
                            <input type="radio"class='form-check-input' name="jenis_kelamin" value="wanita" <?php if(isset($jenis_kelamin) && $jenis_kelamin === 'wanita') echo 'checked'; ?>>Wanita
                        </label>
                    </div>
                    <div class="error"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                    <label for="">Peminatan:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="minat[]"value='coding' <?php if(isset($minat) && in_array('coding', $minat)) echo 'checked'; ?>>Coding
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="minat[]"value='ux_design'  <?php if(isset($minat) && in_array('ux_design', $minat)) echo 'checked'; ?>>UX Design
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="minat[]"value='data_science'  <?php if(isset($minat) && in_array('data_science', $minat)) echo 'checked'; ?>>Data Science
                        </label>
                    </div>
                    <div class="error"><?php if(isset($error_minat)) echo $error_minat; ?></div>

                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
        <div class="row w-50 mt-5 mb-5 mx-auto">
            <div class="col-12">
                <?php
                // Masukkan logic PHP di sini
                if(isset($_POST["submit"])){
                    echo"<h3>Your Input:</h3>";
                    echo 'Nama: '.$_POST['nama'].'<br/>';
                    echo 'Email: '.$_POST['email'].'<br/>';
                    echo 'Alamat: '.$_POST['alamat'].'<br/>';
                    echo 'Kota: '.$_POST['kota'].'<br/>';
                    echo 'Jenis Kelamin: '.$_POST['jenis_kelamin'].'<br/>';
                    echo 'Minat: '.$_POST['minat'].'<br/>';

                    $minat = $_POST['minat'];
                    if(!empty($minat)){
                        echo'Peminatan yang dipilih:';
                        foreach($minat as $minat_item){
                            echo'<br/>'.$minat_item;
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script>
        function resetForm() {
            document.getElementById('form_mahasiswa').reset();
            document.getElementById('nama').value = "";
            document.getElementById('email').value = "";
            document.getElementById('alamat').value = "";
            document.getElementById('kota').value = "semarang";
            document.querySelectorAll('.form-check-input').checked = 'false';
        }
    </script>
</body>

</html>