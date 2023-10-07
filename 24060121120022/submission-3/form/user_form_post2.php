<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Form post 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <?php 
        error_reporting(0);
        if(isset($_POST['submit'])){
            $nama = test_input($_POST['nama']);
            if(empty($nama)){
                $error_nama = 'Nama Harus Diisi';
            }else if(!preg_match("/^[a-zA-Z ]*$/",$nama)){
                $error_nama = "Nama hanya dapat berisi huruf dan spasis";
            }
            $email = test_input($_POST['email']);
                if ($email == '') {
                    $error_email = "Email harus diisi";
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error_email = "Format email tidak benar";
                }
            $alamat = test_input($_POST['alamat']);
                if ($alamat == '') {
                    $error_alamat = "Alamat harus diisi";
                }
            $jenis_kelamin = $_POST['jenis_kelamin'];
                if ($jenis_kelamin == '') {
                    $error_jenis_kelamin = "Jenis kelamin harus diisi";
                }
            $kota = $_POST['kota'];
                if ($kota == '' || $kota == 'kota') {
                    $error_kota = "Kota harus diisi";
                }
            $minat = $_POST['minat'];
                if (empty($minat)) {
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
    <section id="form-post">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" autocomplete="on" action="">
                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" maxlength="50"
                                        value="<?php if (isset($nama)) echo $nama; ?>">
                                    <p class="small text-danger">
                                        <?php if (isset($error_nama)) echo $error_nama; ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?php if (isset($email)) echo $email; ?>">
                                    <p class=" small text-danger">
                                        <?php if (isset($error_email)) echo $error_email; ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label><br>
                                    <textarea class="form-control" id="alamat" name="alamat"
                                        rows="4"><?php if (isset($alamat)) echo $alamat; ?></textarea>
                                    <p class="small text-danger">
                                        <?php if (isset($error_alamat)) echo $error_alamat; ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="kota">Kota/ Kabupaten:</label>
                                    <select class="form-select" id="kota" name="kota">
                                        <option value="Semarang" <?php if (isset($kota) && $kota=='Semarang' )
                                            echo 'selected' ; ?>>Semarang</option>
                                        <option value="Jakarta" <?php if (isset($kota) && $kota=='Jakarta' )
                                            echo 'selected' ; ?>>Jakarta</option>
                                        <option value="Bandung" <?php if (isset($kota) && $kota=='Bandung' )
                                            echo 'selected' ; ?>>Bandung</option>
                                        <option value="Surabaya" <?php if (isset($kota) && $kota=='Surabaya' )
                                            echo 'selected' ; ?>>Surabaya</option>
                                    </select>
                                    <p class="small text-danger">
                                        <?php if (isset($error_kota)) echo $error_kota; ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin:</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                value="pria" <?php if (isset($jenis_kelamin) && $jenis_kelamin=="pria" )
                                                echo 'checked' ?>>
                                            Pria
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                value="wanita" <?php if (isset($jenis_kelamin) &&
                                                $jenis_kelamin=="wanita" ) echo 'checked' ?>>
                                            Wanita
                                        </label>
                                    </div>
                                    <p class="small text-danger">
                                        <?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?>
                                    </p>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Peminatan:</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="coding"
                                                name="minat[]" <?php if (isset($minat) && in_array('coding', $minat))
                                                echo 'checked' ?>>
                                            Coding
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="ux_design"
                                                name="minat[]" <?php if (isset($minat) && in_array('ux_design', $minat))
                                                echo 'checked' ?>>
                                            UX Design
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="data_science"
                                                name="minat[] <?php if (isset($minat) && in_array('data_science', $minat)) echo 'checked' ?>">
                                            Data Science
                                        </label>
                                    </div>
                                    <p class="small text-danger">
                                        <?php if (isset($error_minat)) echo $error_minat; ?>
                                    </p>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" name="submit"
                                    value="submit">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="row justify-content-center align-items-center">
                    <div class="col-8">
                        <div class="card" style="border: none !important;">
                            <div class="card-body">
                                <?php 
                                    if(isset($_POST["submit"])){
                                        echo "<h3>Your Input : </h3>";
                                        echo 'Nama = '.$_POST['nama'].'<br />';
                                        echo 'Email = '.$_POST['email'].'<br />';
                                        echo 'Kota = '.$_POST['kota'].'<br />';
                                        echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'<br />';
                                
                                        $minat = $_POST['minat'];
                                        if (!empty($minat)){
                                            echo 'Peminatan yang dipilih: ';
                                            foreach($minat as $minat_item){
                                                echo '<br />'.$minat_item;
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>