 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User From Get</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            .form-group {
                margin-bottom: 16px;
            }
            label {
                margin-bottom: 8px;
            }
        </style>
    </head>
    <body>
        <?php
            if (isset($_POST['submit'])) {
                $nama = test_input($_POST['nama']);
                if (empty($nama)) {
                    $error_nama = "Nama harus diisi";
                } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                    $error_nama = "Format nama tidak tepat";
                }
                $email = test_input($_POST['email']);
                if ($email == '') {
                    $error_email = "Email tidak boleh kosong";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error_email = "Format tidak tepat";
                }
                $alamat = test_input($_POST['alamat']);
                if ($alamat == '') {
                    $error_alamat = "Alamat tidak boleh kosong";
                }
                
                if (empty($_POST['jenis_kelamin'])) {
                    $error_jenis_kelamin = "Jenis kelamin tidak boleh kosong";
                }else {
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                }

                $kota = $_POST['kota'];
                if ($kota == '' || $kota == 'kota') {
                    $error_kota = "Kota tidak boleh kosong";
                }
                if (empty($_POST['minat'])) {
                    $error_minat = "Minat tidak boleh kosong";
                }else {
                    $minat = $_POST['minat'];
                }
            }
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
        <div class="row w-50 mt-5 mb-5 mx-auto">
            <form method="POST" autocomplete="on" action="">Form Mahasiswa
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="nama" id="nama" maxlength="50" value="<?php 
                    if(isset($nama)) {echo $nama;} ?>">
                    <div class="error" style="color: red"><?php if (isset($error_nama)) echo $error_nama;?></div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" >
                    <div class="error" style="color: red"><?php if (isset($error_email)) echo $error_email;?></div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5"><?php if(isset($alamat)) {echo $alamat;} ?></textarea>
                    <div class="error" style="color: red"><?php if (isset($error_alamat)) echo $error_alamat;?></div>
                </div>
                <div class="form-group">
                    <label for="kota">Kota/Kabupaten:</label>
                    <select id="kota" name="kota" class="form-control">
                        <option value="Semarang" 
                            <?php 
                            if (isset($kota) && $kota == "Semarang") {echo 'selected="true"';} 
                            ?>
                        >Semarang
                        </option>
                        <option value="Jakarta" 
                            <?php 
                            if (isset($kota) && $kota == "Jakarta") {echo 'selected="true"';} 
                            ?>
                        >Jakarta
                        </option>
                        <option value="Bandung"
                            <?php 
                            if (isset($kota) && $kota == "Bandung") {echo 'selected="true"';} 
                            ?>
                         >Bandung
                        </option>
                        <option value="Surabaya" 
                            <?php 
                            if (isset($kota) && $kota == "Surabaya") {echo 'selected="true"';} 
                            ?>
                        >Surabaya
                        </option>
                    </select>
                    <div class="error" style="color: red">
                        <?php 
                        if (isset($error_kota)) echo $error_kota;
                        ?>
                    </div>
                </div>
                <label>Jenis Kelamin:</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" 
                            <?php 
                            if(isset($jenis_kelamin) && $jenis_kelamin == "pria"){echo 'checked';}
                            ?>
                            >Pria
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="Wanita" 
                        <?php 
                        if(isset($jenis_kelamin) && $jenis_kelamin == "Wanita") {echo "checked";} 
                        ?>
                        >Wanita
                    </label>
                </div>
                <div class="error" style="color: red">
                    <?php 
                    if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin;
                    ?>
                </div>
                <label>Peminatan:</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="minat[]" value="coding"
                            <?php if(isset($minat) && in_array('coding', $minat)){echo 'checked';}?>>Coding
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design"
                            <?php if(isset($minat) && in_array('ux_design', $minat)){echo 'checked';}?>>UX Design
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="minat[]" value="data_science"
                            <?php if(isset($minat) && in_array('data_science', $minat)){echo 'checked';}?>>Data Science
                    </label>
                </div>
                <div class="error" style="color: red"><?php if (isset($error_minat)) echo $error_minat;?></div>
                <br>

                <!-- BAGIAN BUTTON -->
                <button type="submit" class="btn btn-primary" name="submit" value="Submit">Sumbit</button>
                <button type="reset" class="btn btn-danger" name="reset" value="Reset">Reset</button>
            </form>
        </div>
        <?php
            if(isset($_POST["submit"])) {
                echo "<h3>Your input:</h3>";
                echo 'Nama = '.$_POST['nama'].'<br/>';
                echo 'Email = '.$_POST['email'].'<br/>';
                echo 'Alamat = '.$_POST['alamat'].'<br/>';
                echo 'Kota/Kabupaten = '.$_POST['kota'].'<br/>';
                echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'<br/>';
                // echo 'Minat = '.$_POST['minat'].'<br/>';

                $minat = $_POST['minat'];
                if(!empty($minat)) {
                    echo 'Permintaan yanng dipilih: ';
                    foreach($minat as $minat_item) {
                        echo '<br/>'.$minat_item;
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
            document.getElementById('kota').value = "semarang";
            document.querySelectorAll('.form-check-input').checked = 'false';
        }
        </script>
    </body>
</html>